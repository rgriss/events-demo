@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h1>{{$user->first_name}} {{$user->last_name}}</h1>
        <ul>
            <li>email: {{$user->email}}</li>
            @if($user->phone)
                <li>phone: {{$user->phone}}</li>
            @endif
        </ul>
    </div>

    <h2>{{$user->first_name}}'s Upcoming Events:</h2>
    @include('event.list',['events'=>$user->futureEvents])

    <h2>{{$user->first_name}}'s Previous Events:</h2>
    @include('event.list',['events'=>$user->previousEvents])

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

    <h2>All Upcoming Events:</h2>
    @include('event.list',['events'=>$all_future_events,'show_signup_links'=>true])

@endsection