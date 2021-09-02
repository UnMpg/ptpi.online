<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.article.index', compact('articles'));
        $tags = Tag::all();
        return view('admin.article.create', compact('tags'));
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
            'konten' => 'required|min:5'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('assets/articles'), $imageName);
        }

        $article = auth('admin')->user()->articles()->create([
            'judul' => $request->judul,
            'image' => $imageName,
            'konten' => $request->konten,
        ]);

        $article->tags()->sync($request->tag_id);
        return redirect(action('ArticleController@index'))->with('save', '"Article" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('admin.article.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->image) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('assets/articles'), $imageName);

            $article->update([
                'judul' => $request->judul,
                'image' => $imageName,
                'konten' => $request->konten,
            ]);
        } else {
            $article->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);
        }
        $article->tags()->sync($request->tag_id);
        return redirect(action('ArticleController@index'))->with('update', '"Article" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(action('ArticleController@index'))->with('delete', '"Artikel" Berhasil Dihapus');
    }
}
