@extends('layouts.master')

@section('content')
    <div class="page-header">
        <p>You are signing up for:</p>
        <h1>{{$event->title}}</h1>
        <h2><small> on {{$event->date}}</small></h2>
    </div>



    {{--New Task Form--}}

    <form action="{{url('event/'.$event->id.'/register')}}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <input type="hidden" name="event_id" value="{{$event->id}}">

        <div class="form-group">
            <label for="first_name" class="col-sm-3 col-sm-offset-1">First Name</label>
            <div class="col-sm-6">
                <input type="text" name="first_name" id="attendee-first-name" class="form-control" value="{{old('first_name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="last_name" class="col-sm-3 col-sm-offset-1">Last Name</label>
            <div class="col-sm-6">
                <input type="text" name="last_name" id="attendee-last-name" class="form-control" value="{{old('last_name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-3 col-sm-offset-1">Phone Number</label>
            <div class="col-sm-6">
                <input type="text" name="phone" id="attendee-phone" class="form-control" value="{{old('phone')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 col-sm-offset-1">Email Address</label>
            <div class="col-sm-6">
                <input type="email" name="email" id="attendee-email" class="form-control" value="{{old('email')}}">
            </div>
        </div>

        <div class="col-sm-offset-1">
            <div class="checkbox" style="margin-bottom: 15px">
                <label>
                    <input type="checkbox" name="agree_to_terms"> I Agree to the <a href="/terms">Terms & Conditions</a>
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-sm-offset-5 col-xs-6">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fa fa-plus"></i> Sign Up
                </button>
            </div>
        </div>
    </form>
@endsection