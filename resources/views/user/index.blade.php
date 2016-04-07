@extends('layouts.master')

@section('content')

    <h1>User index</h1>
    <p>This is a list of all system users.  Click on a user to see their details and scheduled events.</p>
    <ul class="user-list">
        @foreach($users as $user)
            <li>{{$user->id}} : <a href="/user/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a> ({{$user->email}})</li>
        @endforeach
    </ul>

@endsection