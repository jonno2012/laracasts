@extends('layout')
@section('banner')
    <h1>{!! $post->title !!}</h1>
@endsection
@section('content')
    <div class="lg:grid lg:grid-cols-3">
        @include('post.card', ['post' => $post])
    </div>
  @if(!empty($post->comments))
      <ul>
          @foreach($post->comments as $comment)
              <li>{{$comment->body}}</li>
          @endforeach
      </ul>
      @endif
  <a href="/user/{{$post->author->id}}">{{$post->author->name}}</a><br />
    <a href="/">Go back</a>
@endsection
