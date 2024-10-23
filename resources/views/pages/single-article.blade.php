@extends('layout.master')
@section('title', $article->meta_title)
@section('keywords', $article->meta_keywords)
@section('description', $article->meta_description)
@section('content')
<main class="main text-black">
    <div id="main">
        <!-- Post -->
            <article class="post">
                <header>
                    <div class="title">
                        <h2>{{ $article->title }}</h2>
                        <p><a href="{{ route('page.articles', $article->category_id) }}">{{ $article->category->name }}</a></p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01">{{ $article->created_at }}</time>
                    </div>
                </header>
                <div class="flex items-start justify-between">
                    <div class="">
                        <img class="image featured max-w-[400px] rounded-lg object-contain w-full" src="{{ url('storage', $article->image) }}" alt="" />
                        <ul class="stats">
                            <li><a href="#">{{ $article->tags }}</a></li>
                        </ul>
                    </div>
                    <div class="w-8/12 text-justify">
                        <p>{!! $article->content !!}</p>
                    </div>
                </div>
            </article>

    </div>
</main><!-- End .main -->
@endsection