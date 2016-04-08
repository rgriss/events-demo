<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Event;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::orderBy('last_name','asc')->get();
        return view('user.index',compact('users'));
    }

    function show($id)
    {
        $all_future_events = Event::future()->get();

        $user = User::with('events')->findOrFail($id);
        $events = $user->events;

        return view('user.show',compact('user','events','all_future_events'));
    }
}
