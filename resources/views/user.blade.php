@extends('layout')
@section('banner')
    <h1>{!! $user->username !!}</h1>
@endsection
@section('content')
    <article>
        <p>{!! $user->email !!}</p> <!-- use with caution as does not escape -->
    </article>
    @if(!empty($user->posts))
        <ul>
            @foreach($user->posts as $post)
                <li>{{$post->excerpt}}</li>
            @endforeach
        </ul>
    @endif
    <a href="/">Go back</a>
@endsection
