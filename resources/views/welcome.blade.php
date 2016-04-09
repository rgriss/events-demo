@extends('layouts.master')
@section('content')

    <div class="content">
        <h1 class="title text-center">The Event Demo</h1>

        <h2>Task:</h2>
        <p>Create a simple web form using PHP that allows a user to sign up for an event.</p>
        <ul>
            <li>The form should include fields for:
                <ul>
                    <li>first name</li>
                    <li>last name</li>
                    <li>phone number</li>
                    <li>email address</li>
                    <li>an acceptance of Terms & Conditions</li>
                </ul>
            </li>
            <li>All fields are required except for the phone number.</li>
            <li>Upon the user’s submission of the form, the data should be saved to a MySQL database.</li>
            <li>After saving, if the email address has registered for any other events, those events should be displayed.</li>
            <li>The events are to be broken up into two lists:
                <ul>
                    <li>previous events, and</li>
                    <li>future events</li>
                </ul>
            </li>
            <li>Whether the email address has been used or not, there should also be a list of all upcoming events.</li>
            <li>The event lists should include the event name and date, both pulled from the database.</li>
        </ul>

        <h2>Notes:</h2>
        <ul>
            <li>Database integrity and security are important.</li>
            <li>There also should not be any PHP errors, warnings, or notices.</li>
            <li>The page should exhibit basic responsive behavior.</li>
        </ul>
        <p></p>

        <h2>Include:</h2>
        <ul>
            <li>All Code.</li>
            <li>Any special information needed for displaying the page.</li>
            <li>An export of the database structure and data.</li>
        </ul>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">The Solution:</h3>
            </div>

            <div class="panel-body">
                <p>Here is the <strong>next</strong> event in the database.  Click the button to sign up.</p>
                <?php $event = App\Event::future()->first() ?>
                <h3 class="text-center">{{$event->title}}</h3>
                <h4 class="text-center">{{$event->date->format('n/j/y')}}</h4>
                <p class="text-center">
                    <a class="btn btn-lg btn-primary" href="event/{{$event->id}}/register"><i class="fa fa-plus"></i> Sign Up</a>
                </p>
            </div>

        </div>

        <p>PS: Please see the <a href="/about">about</a> page for installation instructions, development notes, code samples, and other thoughts on my overall approach to this and other projects.  Thank you!</p>
</div>

@endsection

