<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\User;
use App\Attendee;

class EventController extends Controller
{
    //
    function index(){

        $events = Event::orderBy('date','desc')->get();
        $users = User::all();

        $email=session()->pull('email');

        if($email){
            $attendee = User::ByEmail($email)->first();
            $attendeePrevious = $attendee->previousEvents();
            $attendeeUpcoming = $attendee->upcomingEvents();
        }

        $previous_events = Event::past()->get();
        $future_events = Event::future()->get();

        return view('event.index',compact('events','users','previous_events','future_events'));
    }

    function show($id)
    {
        $event = Event::with('attendees')->findOrFail($id);
        $attendees = $event->attendees;
        return view('event.show',compact('event','attendees'));
    }
    function getSignup($id){
        $event = Event::findOrFail($id);
        return view('event.sign-up-form')->with('event',$event);
    }

    function postSignup(Request $request){
        $event = Event::findOrFail($request['event_id']);
        if(!$event){
            //todo:: improve error handling
            echo "Oops, there was a problem!";
        }

        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'agree_to_terms'=>'required',
        ]);

        $user = User::byEmail($request['email'])->first();

        //todo: consider security here
        if(!$user){
            $user = User::create([
                'first_name'=>$request['first_name'],
                'last_name'=>$request['last_name'],
                'email'=>$request['email'],
            ]);
        }

        //at this point, we have a good user and a good event.
        //EITHER of these would work:

        $user->events()->attach($event->id);
        //$event->attendees()->attach($user->id);


        session()->flash('email',$request['email']);
        session()->flash('success','Success!');

        return redirect('event');

    }
}
