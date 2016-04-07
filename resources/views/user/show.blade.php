@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h1>{{$user->first_name}} {{$user->last_name}}</h1>
        <h2>email: <small>{{$user->email}}</small></h2>
        @if($user->phone)
            <h2>phone: <small>{{$user->phone}}</small></h2>
        @endif
    </div>

    <h2>{{$user->first_name}}'s Future Events:</h2>
    @include('event.list',['events'=>$user->futureEvents()->get()])

    <h2>{{$user->first_name}}'s Previous Events:</h2>
    @include('event.list',['events'=>$user->previousEvents()->get()])

    {{--<h2>User Events:</h2>--}}

    {{--@if($events->count() <= 0)--}}
        {{--<p>There are no events for this user yet.</p>--}}
    {{--@else--}}
    {{--<ul>--}}
        {{--@foreach($events as $event)--}}
            {{--<li>{{$event->id}} : <a href="/event/{{$event->id}}">{{$event->title}}</a> ({{$event->date}})</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--@endif--}}

@endsection