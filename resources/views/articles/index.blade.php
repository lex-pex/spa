@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Articles
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('articles.create') }}" class="btn btn-outline-dark">Add Article</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($articles as $article)
                        <div class="alert alert-info pt-4">
                            <div class="row">
                                <div class="col-6">{{ $article->title }}</div>
                                <div class="col-6 text-right small">{{ $article->id }}</div>
                            </div>
                            <div class="row border-top p-2">
                                <div class="col-12">
                                    {{ $article->text }}
                                </div>
                            </div>
                            <div class="row border-top">
                                <div class="col-6 small">
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-small btn-outline-dark">Edit Article</a>
                                </div>
                                <div class="col-6 text-right small">
                                    {{ $article->created_at }}
                                    <br/>
                                    {{ $article->updated_at }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                {{ $articles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
