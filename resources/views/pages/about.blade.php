@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h1>About this site <small>and installation instructions.</small></h1>
    <p>This is a simple website built as a demo.  This page explains all the steps I took, but assuming your environment is similar to mine, and/or you are familiar/comfortable with Laravel, you can easily set the project up to run on your local machine with just a few commands:</p>

    <pre><code>
    git clone git@bitbucket.org:rgrissinger/lc-events.git
    </code></pre>
    or maybe:
    <pre><code>
    git clone https://rgrissinger@bitbucket.org/rgrissinger/lc-events.git
    </code></pre>

    <p>Once you have the code, assuming you have set up your local environment (see below for more info), simply run</p>

    <pre><code>
    composer update
    php artisan migrate --seed
    npm install
    bower install
    gulp
        </code></pre>

    <p>At this point, you should have a fully functional local copy of the program, complete with sample data, and all front-end assets compiled.  You can now visit http://local.events.com (or whatever you set up) and sign up for events, create users, and... well, please explore for yourself!</p>
    <p>For extra credit, I went ahead and deployed a 'production' version of the site to <a href="http://event-demo.xyz/" target="_blank">http://event-demo.xyz/</a>.  Please ask me if you'd to hear about Forge, Digital Ocean, Linode, DNS, Mailtrap, Mailgun, and other testing/staging/hosting tools at our disposal.</p>
    <p>PS: Regarding test data: The FIRST user is assigned to ALL events, and the FIRST event (that is, event id #1) is assigned to ALL users.</p>

    <hr>
    tl;dr
    <h2>Prerequisites</h2>
    <p>I used the basic toolset that I am most familiar with, including but not limited to:</p>
    <ul>
        <li>Laravel 5.2</li>
        <li>bower</li>
        <li>gulp</li>
        <li>php</li>
        <li>mysql</li>
    </ul>
    <h3><small>*recommended, but not required:</small></h3>
    <ul>
        <li>Laravel Homestead</li>
        <li>Laravel Forge (for staging/production)</li>

    </ul>

    <p>If you are recreating this project on your local machine, make sure the basics above are set up properly.</p>

    <p>I ran the following on my local machine:</p>
    <pre><code>
    cd ~/Code
    laravel new lc-events
        </code></pre>

    <p>I copied <code>.env.example</code> to <code>.env</code></p>

    <p>*If you copy this for your own local use, you will need to configure your local environment.  Assuming you have Laravel Homestead set up, it's as easy as editing your homestead.yaml file and your local /etc/hosts, then updating the database credentials in your .env file.  Please ask me if you need assistance.</p>
    <p>Once the environment is set up, back to the command line from the project root:</p>
    <pre><code>
    php artisan key:generate
    composer update
    npm install
        </code></pre>

    <p>That's about all it takes to get started.  Next, I set up a project on bitbucket and sent my code up:</p>

    <pre><code>
    git init
    git remote add origin git@bitbucket.org:rgrissinger/lc-events.git
    git push -u origin master
        </code></pre>

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
@endsection