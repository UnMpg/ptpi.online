<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\WarungMail;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topic.index', compact('topics')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Topic::create($data);
        return redirect(action('TopicController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('admin.topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $data = $this->validate($request, [
            'content' => 'required'
        ]);

        $topic->update($data);
        return redirect(action('TopicController@index'))->with('update', '"Pertanyaan" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect(action('TopicController@index'))->with('delete', '"Pertanyaan" Berhasil Dihapus');
    }

    public function submitEmail(Topic $topic)
    {
        $data = $topic;
        $pengurus = $topic->user;
        $data = $topic;
        $data['email_pic'] = $pengurus->email;
        $data['name_pic'] = $pengurus->name;
        $data['gender'] = $pengurus->gender;

        Mail::send('home.mail', ['data' => $data->toArray()], function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to("seminarptpi@iahe.or.id", "PTPI Official");
            $message->subject($data['subject']);
        });

        if (Mail::failures()) {
            return;
        }

        Topic::find($topic->id)->update(['status' => true]);
        return back()->with('update', '"Pertanyaan" Berhasil Dikirim');
    }

    public function submitEmailVerify(Topic $topic)
    {
        $data = $topic;
        $pengurus = $topic->user;
        $data = $topic;
        $data['email_pic'] = $pengurus->email;
        $data['name_pic'] = $pengurus->name;
        $data['gender'] = $pengurus->gender;

        Topic::find($topic->id)->update(['status' => true]);
        return back()->with('update', '"Pertanyaan" Berhasil Dikirim');
    }
}
