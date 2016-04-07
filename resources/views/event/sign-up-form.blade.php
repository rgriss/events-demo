@extends('layouts.master')

@section('content')
    <p>You are signing up for:</p>
    <h1>{{$event->title}}</h1>
    <h2> on {{$event->date}}</h2>


    {{--Include error messages--}}
    @include('common.errors')

    {{--New Task Form--}}

    <form action="{{url('event/'.$event->id.'/register')}}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <input type="hidden" name="event_id" value="{{$event->id}}">

        <div class="form-group">
            <label for="first_name">First Name</label>
            <div class="col-sm-6">
                <input type="text" name="first_name" id="attendee-first-name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <div class="col-sm-6">
                <input type="text" name="last_name" id="attendee-last-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <div class="col-sm-6">
                <input type="text" name="phone" id="attendee-phone" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <div class="col-sm-6">
                <input type="email" name="email" id="attendee-email" class="form-control">
            </div>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="agree_to_terms"> I Agree to the <a href="/terms">Terms & Conditions</a>
            </label>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Sign Up
                </button>
            </div>
        </div>
    </form>
@endsection