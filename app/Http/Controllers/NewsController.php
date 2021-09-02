<?php

namespace App\Http\Controllers;

use App\News;
use App\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $news = News::all();
        return view('admin.new.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.new.index', compact('news'));
        $tags = Tag::all();
        return view('admin.new.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
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
            $request->image->move(public_path('assets/news'), $imageName);
        }

        $new = auth('admin')->user()->news()->create([
            'judul' => $request->judul,
            'image' => $imageName,
            'konten' => $request->konten,
        ]);

        $new->tags()->sync($request->tag_id);
        return redirect(action('NewsController@index'))->with('save', '"Berita" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {
        return view('admin.new.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        $tags = Tag::all();
        return view('admin.new.edit', compact('new', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $new)
    {
        if ($request->image) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('assets/news'), $imageName);

            $new->update([
                'judul' => $request->judul,
                'image' => $imageName,
                'konten' => $request->konten,
            ]);
        } else {
            $new->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);
        }
        $new->tags()->sync($request->tag_id);
        return redirect(action('NewsController@index'))->with('update', '"Berita" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {
        $new->delete();
        return redirect(action('NewsController@index'))->with('delete', '"Berita" Berhasil Dihapus');
    }
}
