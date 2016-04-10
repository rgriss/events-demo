@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h1>Events</h1>
        <p>Click on any event to view that event's details.</p>
        <p>For future events, you can click the button to Sign Up.</p>
    </div>

    <h2>Upcoming Events:</h2>
    @include('event.list',['events'=>$future_events, 'show_signup_links'=>true])

    {{--<h2>Past Events</h2>--}}
{{--    @include('event.list',['events'=>$previous_events])--}}

@endsection