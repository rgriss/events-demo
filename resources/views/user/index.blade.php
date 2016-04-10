@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h1>User index</h1>
        <p>This is a list of all system users, in descending alphabetical order (by Last Name).  Click on a user to see their contact details and scheduled events.</p>
    </div>

    <ul class="user-list">
        @foreach($users as $user)
            <li><a href="/user/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a> ({{$user->email}})</li>
        @endforeach
    </ul>

@endsection