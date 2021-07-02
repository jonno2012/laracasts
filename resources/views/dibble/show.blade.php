@extends('layout')
@section('banner')
    <h1>{{ $dibble->call_sign }}</h1>
@endsection
@section('content')
    @if(!empty($dibble->nick))
        <h2>{{$dibble->nick->name}}</h2>
    @endif

    @if(!empty($dibble->nick->address))
        <address>
            @if(!empty($dibble->nick->address->name))
                {{$dibble->nick->address->name}}<br />
            @endif
        </address>
    @endif
    {{--    <a href="/user/{{$post->author->id}}">{{$post->author->name}}</a><br />--}}
    {{--    <a href="/">Go back</a>--}}
@endsection
