<?php

namespace App\Http\Controllers;

use App\Article;
use App\Events\AddArticleSpaEvent;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ArticleSpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function feed()
    {
        return view('spa.articles');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if(request('reload'))
            $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        else
            $articles = Article::all()->sortByDesc('id');
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ArticleResource
     */
    public function store(Request $request)
    {
        $a = new Article();
        $a->title = $request->input('title');
        $a->text = $request->input('text');
        if($a->save()) {
//            $articles = Article::orderBy('created_at', 'desc')->paginate(3);
//            $articles = ArticleResource::collection($articles);
            event(new AddArticleSpaEvent());
//            event(new AddArticleSpaEvent($a->id, $a->title, $a->text, $a->created_at, $a->updated_at));
//            return new ArticleResource($a);
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ArticleResource
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ArticleResource
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        if($article->save()){
            return new ArticleResource($article);
        }
        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ArticleResource
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->delete()) {
            return new ArticleResource($article);
        }
        return null;
    }
}
