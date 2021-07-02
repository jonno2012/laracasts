@extends('layout')
@section('banner')
    <h1>Dibbles</h1>asdasd
@endsection
@section('content')
    @if(!empty($dibbles))
        @foreach($dibbles as $dibble)
            <h2>{{$dibble->call_sign}}</h2>

            @if(!empty($dibble->nick->address))
                <address>
                    @if(!empty($dibble->nick->address->name))
                        {{$dibble->nick->address->name}}<br/>
                    @endif
                </address>
            @endif
        @endforeach
    @endif
@endsection
