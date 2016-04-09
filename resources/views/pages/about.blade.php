@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="page-header">
        <h1>About this site</h1>

        <p>This is a simple "event registration" website, built as a demonstration of php, mysql, and other related skills, tools, concepts, and techniques.  The core requirement was basically to "build a form that allows users to register for events", but I tried to go above and beyond in many ways.</p>
    </div>
    <p>There are endless points of interest and discussion in the code, and I could spend hours trying to explain in text form how and why I did XYZ... (I will ramble about some of these below...) but perhaps the work will speak for itself.  I think it meets and exceeds the requirements of the "assessment challenge", with a little sugar on top.  I hope you like it!</p>

    <p>My Goal was to demonstrate proficiency in:</p>
    <ul>
        <li>PHP</li>
        <li>MYSQL</li>
        <li>HTML</li>
        <li>CSS</li>
    </ul>
    <p>Furthermore, I hope the code also demonstrates concepts like...</p>
    <ul>
        <li>Basic Responsive Design</li>
        <li>Good Coding Standards
            <ul>
                <li>Consistent, logical model/variable names</li>
                <li>Simple/Elegant Design</li>
                <li>Appropriate Separation of Concerns (Good use of MVC)</li>
                <li>"Practically DRY" (Please ask me for examples)</li>
                <li>Simple, Restful approach to routing/URL structure</li>
            </ul>
        </li>
        <li>Attention to detail</li>
    </ul>

    <p>For ease of use (and extra credit), I deployed a 'production' version of the site to <a href="http://event-demo.xyz/" target="_blank">http://event-demo.xyz</a>, too.  Please ask me if you'd to hear more about how I went about that, and/or for more info on any individual pieces of the stack I chose.</p>
    <p>Thank you for your time - If you have any questions or concerns, please contact me at any reasonable hour:</p>
    <div class="well">
        <h4>Ryan Grissinger</h4>
        <ul>
            <li>ryan.grissinger@gmail.com</li>
            <li>614-203-9405</li>
        </ul>
    </div>

    <p>PS: while the site is built with Laravel (v5.2) and Bootstrap (v3.3.6), I COULD have built something similar with a different framework, or without any framework... But there are several reasons I chose to do it this way.  Please just ask me if you have any questions in this regard.</p>

    <h2>Code / Installation</h2>

    <p>The easiest way to access the code is via bitbucket:</p>
    <p class="text-center"><a href="https://bitbucket.org/rgrissinger/lc-events">https://bitbucket.org/rgrissinger/lc-events</a></p>

    <p>Assuming your environment is similar to mine, and/or you are familiar/comfortable with Laravel, you can easily set the project up to run on your local machine with just a few commands:</p>

    <p>First, clone the project with something like this:</p>
    <pre><code>
    git clone https://rgrissinger@bitbucket.org/rgrissinger/lc-events.git
    </code></pre>

    <p>Once you have the code, assuming you have set up your local environment (see below for more info), simply run these from the project root:</p>

    <pre><code>
    composer update
    php artisan migrate --seed
    npm install
    bower install
    gulp
        </code></pre>

    <p>At this point, you should have a fully functional local copy of the program, complete with a fully built database, sample "seed" data (Users and Events), and all your front-end asset depndencies (jquery/bootstrap) compiled and minified for production.  You can now visit http://local.events.com (or whatever local domain you set up), sign up for events, and... well, please explore for yourself!</p>

    <p class="alert alert-info">STOP HERE: Assuming you are familiar enough with your own system to deal with issues like configuring your local webserver, setting up your own database, making sure your database credentials match, etc., then the above is about all you need to know.  The rest of this page will explain some more of these issues in detail, but your circumstances may vary depending on the specifics of your system.  Please feel free to email me if you need help setting anything up.</p>




    <hr>
    <p class="alert alert-warning"><b>tl;dr alert!</b> the rest of this doc may be too much to read and digest in one sitting.  Please scan at your liesure or feel free to ignore.  Thank you!</p>
    <h2>Prerequisites</h2>
    <p>If you are recreating this project on your local machine, make sure your machine has following tools set up:</p>
    <p>I used the basic toolset that I am most familiar with, including but not limited to:</p>
    <ul>
        <li>bower</li>
        <li>gulp</li>
        <li>php 5.6</li>
        <li>mysql</li>
    </ul>
    <h3><small>*recommended, but not required:</small></h3>
    <ul>
        <li>Vagrant</li>
        <li>Virtualbox</li>
        <li>Laravel Homestead</li>
        <li>Laravel Forge (for staging/production)</li>
    </ul>


    <h2>Environment</h2>
    <p>This system leverages the .env approach to multiple environments... so we can have, for example, local, dev, and production copies of the code running, but only have to change things like database or API credentials in ONE place (the .env file).</p>

    <p>Copy <code>.env.example</code> to <code>.env</code></p>
    <p>The only things you should HAVE to change are the database credentials.  For example:</p>
    <pre><code>
    DB_DATABASE=lcevents
    DB_USERNAME=homestead
    DB_PASSWORD=secret
        </code></pre>

    <p>If you are using Laravel Homestead, just add the site and database to your <code>~/.homestead/Homestead.yaml</code> file like this:</p>
    <pre><code>
sites:
    - map: local.events.com
        to: /home/vagrant/Code/lc-events/public

databases:
    - lcevents
        </code></pre>
    <p>Run <code>Homestead up --provision</code> or similar.</p>
    <p>Finally, add something like this to your /etc/hosts :</p>
    <pre><code>
    192.168.10.10   local.events.com
    </code></pre>

    <p>Once the environment is set up, back to the command line from the project root:</p>
    <pre><code>
    composer update
    php artisan key:generate
    npm install
    bower install
    gulp
        </code></pre>

    <h2>About Test Data</h2>
    <p>Assuming you used the --seed option, your database has test data set up.</p>
    <p>The FIRST user is assigned to ALL events, and the FIRST event (that is, event id #1) is assigned to ALL users.</p>

    <h2>bower, elixr, and gulp</h2>
    <p>Bower is package manager for front end packages.  In this case, I pull in bootstrap and jquery with bower, use elixr to explain how I want it compiled, and then everything is compiled into a single, minified file by running <code>gulp</code>. (Well, two files: one for CSS and one for JS).</p>
    <p>I regularly use <code>gulp watch</code> so when I make a change to a source file, it's automatically compiled and visible in the browser.</p>
    <p>Elixr (which comes with Laravel) helps to compile assets like js and css files into a production-ready state.  See <code>gulpfile.js</code> for more info, and see <code>views/layouts/master.blade.php</code> to see how it's implemented.  </p>
    <p>This project does not have much in it's gulpfile, but some examples of the next things we might "mix in" could be DataTables, Custom Fonts, Custom Icons, etc.</p>

    <h2>Advanced Laravel Usage</h2>


    <h3>Migrations and Seeds</h3>
    <p>Migrations are like version control for the database.</p>
    <p>Instantly re-create a fully populated database as follows:</p>
    <p><code>php artisan migrate --seed</code></p>
    <p><code>php artisan migrate:refresh --seed</code></p>

    <h3>Query Scopes</h3>

    <p>For example, the user model uses a query scope to pull users by email address.</p>


    <h1>Database integrity</h1>
    <p>There is a many-to-many relationship between users and events...</p>
    <p>The 'create_event_user_table' migration sets the table up properly:</p>

<pre><code>
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {

            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('event_id')->references('id')->on('events')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'event_id']);
        });
    }
    </code></pre>

    <p>One last thing: Full Disclosure: I "borrowed" the logo and a few other visual aspects from <a href="https://lifestylecommunities.com/">https://lifestylecommunities.com</a>.  I hope you don't mind!</p>
@endsection