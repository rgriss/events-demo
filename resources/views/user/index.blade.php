@extends('layouts.master')

@section('content')

    <h1>User index</h1>
    <p>This is a list of all system users.  Click on a user to see their details and scheduled events.</p>
    <ul class="user-list">
        @foreach($users as $user)
            <li><a href="/user/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a> ({{$user->email}})</li>
        @endforeach
    </ul>

@endsection