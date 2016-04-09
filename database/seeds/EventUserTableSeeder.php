<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;

class EventUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //prepare our models
        $users = User::all();
        $events = Event::all();

        $firstUser = User::first();
        $firstEvent = Event::first();

        //assign the first user to all events
        foreach($events as $event){
            $firstUser->events()->detach($event->id);
            $firstUser->events()->attach($event->id);
        }

        //assign all users to the first event
        foreach($users as $user)
        {
            $firstEvent->attendees()->detach($user->id);
            $firstEvent->attendees()->attach($user->id);
        }

    }
}
