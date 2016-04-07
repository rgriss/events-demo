@extends('layouts.master')

@section('content')

    <h1>Events</h1>

    <p>Click on any event to view that event's details and to sign up.</p>



    <h2>Future Events</h2>
    @include('event.list',['events'=>$future_events, 'show_signup_links'=>true])

    <h2>Past Events</h2>
    @include('event.list',['events'=>$previous_events])

@endsection