<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\User;
use App\Attendee;

class EventController extends Controller
{
    /**
     * display a list of events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(){

        $events = Event::orderBy('date','desc')->get();
        $users = User::all();

        $previous_events = Event::past()->get();
        $future_events = Event::future()->get();

        return view('event.index',compact('events','users','previous_events','future_events'));
    }

    /**
     * Show an individual event
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function show($id)
    {
        $event = Event::with('attendees')->findOrFail($id);
        $attendees = $event->attendees;
        return view('event.show',compact('event','attendees'));
    }

    /**
     * Show the signup form
     *
     * @param $id
     * @return $this
     */
    function getSignup($id){
        $event = Event::findOrFail($id);
        return view('event.sign-up-form')->with('event',$event);
    }

    /**
     * Process the signup form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
            session()->flash('alert-info','By the way, we created a new user for <strong>'.$user->first_name.'</strong>.  In the real world, we could implement some kind of email verification to be sure that the real owner of <strong>'.$user->email.'</strong> actually initiated or approved of this request.  But this is just a demo, for the time being, anyone can enter any email address.');
        }

        //at this point, we have a good user and a good event.
        //EITHER of these would work:

        //why call detach first?  to avoid integrity issues.
        $user->events()->detach($event->id);
        $user->events()->attach($event->id);

        //$event->attendees()->attach($user->id);

        $words=['Terrific','Excellent','Congratulations','Stellar','Wonderful','Yay'];
        $word=$words[array_rand($words)];

        session()->flash('alert-success',$word.'! <strong>'.$user->first_name.'</strong> is signed up for <strong>'.$event->title.'</strong>.');

        return redirect('user/'.$user->id);
        //return redirect('event');

    }
}
