@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="page-header">
        <h1>About this site</h1>
    </div>
    <div class="well">
        <p>To whom it may concern:</p>
        <p>This is a simple "event registration" website, built in my spare time over a few days, in early April 2016, as part of a job application process.  It's meant to demonstrate php, mysql, and other related skills, tools, concepts, and techniques.</p>
        <p>The core requirement was to <strong>"build a form that allows users to register for events"</strong>, but hopefully it's apparent that I tried to go above and beyond in many ways.  I put a good deal of extra effort into the front-end details, (and the 'documentation'), treating it as a complete "potentially shippable product", not "just a web form".</p>
        <p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#goals" aria-expanded="false" aria-controls="goals">Read more about the project goals
            </button></p>
        <div id="goals" class="collapse">
            <p>There are endless individual points of interest and discussion in the code... I tried to use a variety of techniques throughout.</p>
            <p>My goal was to demonstrate proficiency in:</p>
            <ul>
                <li>PHP</li>
                <li>MYSQL</li>
                <li>HTML</li>
                <li>CSS</li>
            </ul>
            <p>Furthermore, I hope the code also demonstrates concepts like...</p>
            <ul>
                <li>Simple/Modern/Elegant Design (as in Web Design)</li>
                <li>Simple/Elegant Design (as in Application Architecture)</li>
                <li>Appropriate Separation of Concerns (Good use of MVC)</li>
                <li>Responsive Design Principles</li>
                <li>Good Coding Practices
                    <ul>
                        <li>Consistent, logical model/variable names</li>
                        <li>"Practically DRY" (Please ask me for examples)</li>
                        <li>Simple, Restful approach to routing/URL structure</li>
                    </ul>
                </li>
                <li>Attention to detail (Please see <code>app.scss</code> and/or ask me about the navbar!)</li>
            </ul>
            <p>I will (ramble?) about some of these points below, but the work always speaks for itself... in any case, I look forward to discussing some of the details when the time is right.</p>
            <hr>
        </div>

        <p>While the site is built with Laravel (v5.2) and Bootstrap (v3.3.6), I COULD have built something similar with a different framework, or without any framework.  However, there are several reasons I chose to do it this way...  Please just ask me if you have any questions in this regard.</p>

        <p>Anyway, I think the end result meets the requirements of "the assessment challenge", with a little sugar on top.</p>
        <p>I hope you like it! Thank you for the opportunity!</p>
        <p>Sincerely,</p>
        <p>Ryan Grissinger<br>
            <a href="mailto:ryan.grissinger@gmail.com">ryan.grissinger@gmail.com</a><br>
            <a href="tel:614-203-9405">614-203-9405</a>
        </p>
        <p><em>PS/Full Disclosure: I "borrowed" the LC logo and a few other visual aspects from <a href="https://lifestylecommunities.com/">https://lifestylecommunities.com</a> in an attempt to make it somewhat familiar and consistent with your brand.  I hope you don't mind!</em></p>
    </div>

@endsection
