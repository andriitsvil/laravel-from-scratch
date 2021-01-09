@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @forelse($articles as $article)
                    <div class="title">
                        <h2><a class="article_list" href="{{ $article->path() }}">{{ $article->title }}</a></h2>
                        <span class="byline">{{ $article->excerpt }}</span></div>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>
                @empty
                    <p>no articles yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection