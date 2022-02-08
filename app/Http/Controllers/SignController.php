<?php

namespace App\Http\Controllers;

use App\KeynoteSpeaker;
use Illuminate\Http\Request;

class SignController extends Controller
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
        $signs = KeynoteSpeaker::groupBy('name')->get();
        return view('admin.sign.index', compact('signs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.sign.create');
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
        $unique_id = time();
        $data['unique_id'] = $unique_id;

        KeynoteSpeaker::create($data);
        return redirect(action('SignController@index'))->with('save', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function show(KeynoteSpeaker $sign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function edit(KeynoteSpeaker $sign)
    {
        return view('admin.sign.edit', compact('sign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KeynoteSpeaker $sign)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        $sign->update($data);
        return redirect(action('SignController@index'))->with('update', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeynoteSpeaker $sign)
    {
        $sign->delete();
        return redirect(action('SignController@index'))->with('delete', 'Data Berhasil Dihapus');
    }
}
