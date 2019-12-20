<?php

namespace App\Http\Controllers;

use App\Article;
use App\Events\AddArticleEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index', [
//            'articles' => Article::all()->sortByDesc('id')
            'articles' => Article::orderBy('created_at', 'desc')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'title' => 'required|min:5|max:128',
            'text' => 'required|min:10|max:256'
        ]);
        $data = $request->except('_token');
        $article = new Article();
        $article->fill($data);
        $article->save();

        // outdated method fire(...);
//        Event::fire(new AddArticleEvent($article, $request->user()));

        // New working method dispatch(...);
//        Event::dispatch(new AddArticleEvent($article, $request->user()));

        // Global Helper event(...);
//        event(new onAddArticleEvent($article, $request->user()));

        // for Manually Registered Event in EventServiceProvider::boot()
//        Event::dispatch('AddArticleEvent', [$article, $request->user()]);
        event(new AddArticleEvent($article, $request->user()));

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
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
        $this->validate($request, [
            'title' => 'required|min:5|max:128',
            'text' => 'required|min:10|max:256'
        ]);
        $data = $request->except('_token');
        $article->fill($data);
        $article->save();
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
