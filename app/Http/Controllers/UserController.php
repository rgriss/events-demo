<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    function show($id)
    {
        $user = User::with('events')->findOrFail($id);
        $events = $user->events;

        return view('user.show',compact('user','events'));
    }
}
