@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h1>{{$event->title}}</h1>

        <p>This event occurs on:</p>
        <h2><small>{{$event->date->format('l, F jS, Y')}}</small></h2>
    </div>

    <h3>Who's going?</h3>
    @if($attendees->count() > 0)
        <ul class="user-list">
            @foreach($attendees as $attendee)
                <li><a href="/user/{{$attendee->id}}">{{$attendee->first_name}} {{$attendee->last_name}}</a> ({{$attendee->email}})</li>
            @endforeach
        </ul>
    @else
        <p>Nobody is going yet.</p>
    @endif

@endsection