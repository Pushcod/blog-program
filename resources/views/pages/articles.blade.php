@extends('layout.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)

@section('content')
<div class="container">
    <livewire:articles.articles-list :category-id='$id' />
</div><!-- End .container -->
@endsection