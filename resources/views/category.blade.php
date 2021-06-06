@extends('layout')
@section('banner')
    <h1>{!! $category->title !!}</h1>
@endsection
@section('content')
    <article>
        <h1>{{ $category->name }}</h1>
        @if(!empty($category->posts))
            <ul>
            @foreach($category->posts as $post)
                <li>{{$post->title}}</li>
                @endforeach
            </ul>
        @endif
    </article>
    <a href="/">Go back</a>
@endsection
