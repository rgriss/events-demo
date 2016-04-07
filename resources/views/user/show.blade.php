@extends('layouts.master')

@section('content')

    <h1>{{$user->first_name}} {{$user->last_name}}</h1>
    <h2>{{$user->email}}</h2>

    <h2>Future Events:</h2>
    @include('event.list',['events'=>$user->futureEvents()->get()])

    <h2>Previous Events:</h2>
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