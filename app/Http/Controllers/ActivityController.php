<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Tag;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a activity resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.activity.index', compact('activities'));
        $tags = Tag::all();
        return view('admin.activity.create', compact('tags'));
    }

    /**
     * Store a activityly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('assets/activities'), $imageName);
        }

        $activity = auth('admin')->user()->activities()->create([
            'judul' => $request->judul,
            'image' => $imageName,
            'konten' => $request->konten,
        ]);

        $activity->tags()->sync($request->tag_id);
        return redirect(action('ActivityController@index'))->with('save', '"Actifitas" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('admin.activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $tags = Tag::all();
        return view('admin.activity.edit', compact('activity', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        if ($request->image) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('assets/activities'), $imageName);

            $activity->update([
                'judul' => $request->judul,
                'image' => $imageName,
                'konten' => $request->konten,
            ]);
        } else {
            $activity->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);
        }
        $activity->tags()->sync($request->tag_id);
        return redirect(action('ActivityController@index'))->with('update', '"Actifitas" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect(action('ActivityController@index'))->with('delete', '"Actifitas" Berhasil Dihapus');
    }
}
