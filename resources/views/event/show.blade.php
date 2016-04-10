@extends('layouts.master')

@section('content')

    <div class="page-header">
        <a href="/event/{{$event->id}}/register" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Sign Up</a>
        <h1 class="event-title">{{$event->title}}</h1>
        <p><strong>Event Description:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolores explicabo fuga maiores quaerat quo sit. Dignissimos dolorem fuga impedit non quos, ut voluptate! Accusamus delectus doloremque expedita itaque labore nam necessitatibus, quas recusandae. Ab accusamus consequatur consequuntur cumque deleniti doloremque, eos exercitationem, laboriosam laborum mollitia, necessitatibus nisi numquam omnis.</p>
        <h2 class="event-date"><small>{{$event->date->format('l, F jS, Y')}}</small></h2>
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