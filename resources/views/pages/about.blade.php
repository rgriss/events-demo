@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p class="visible-xs-block alert alert-warning"><i class="fa fa-code"></i> Code samples on this page are best viewed on larger screens.</p>
    <div class="page-header">
        <h1>About this site</h1>
        <div class="well">
            <p>To whom it may concern:</p>
            <p>This is a simple "event registration" website, built as part of a job application process, as a demonstration of php, mysql, and other related skills, tools, concepts, and techniques.</p>
            <p>The core requirement was to "build a form that allows users to register for events", but I tried to go above and beyond in many ways.  I put a good deal of extra effort into the front-end details, treating it as a complete "potentially shippable product", not "just a web form".</p>
            <p>There are endless points of interest and discussion in the code... I tried to use a variety of techniques throughout.  </p>
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
            <p>While the site is built with Laravel (v5.2) and Bootstrap (v3.3.6), I COULD have built something similar with a different framework, or without any framework.  However, there are several reasons I chose to do it this way...  Please just ask me if you have any questions in this regard.</p>
            <p>For ease of use (and extra credit), I also deployed a 'production' version of the site to <a href="http://event-demo.xyz/" target="_blank">http://event-demo.xyz</a>, too.  Please ask me if you'd to hear more about how I went about that, and/or for more info on any individual pieces of the stack I chose.</p>
            <p>Anyway, I think the end result meets the requirements of "the assessment challenge", with a little sugar on top.</p>
            <p>I hope you like it! Thank you for the opportunity!</p>
            <p>Sincerely,</p>
            <p>Ryan Grissinger<br>
                <a href="mailto:ryan.grissinger@gmail.com">ryan.grissinger@gmail.com</a><br>
                <a href="tel:614-203-9405">614-203-9405</a>
            </p>
            <p><em>PS/Full Disclosure: I "borrowed" the LC logo and a few other visual aspects from <a href="https://lifestylecommunities.com/">https://lifestylecommunities.com</a> in an attempt to make it somewhat familiar and consistent with your brand.  I hope you don't mind!</em></p>
        </div>
    </div>

    <h1>Code / Local Installation</h1>

    <h2>Prerequisites</h2>
    <p>The project was developed on a linux system, but the following instructions should generally apply to mac/windows as well.  From this point forward, we'll assume you are familiar with the following tools (and other basics of your own system), but if you need any help, please feel free to ask.</p>
    <p>If you are recreating this project on your local machine, make sure your machine has following basic set of tools installed:</p>
    <h3><small>required</small></h3>
    <ul>
        <li>php 5.6+</li>
        <li>mysql</li>
        <li>node / npm</li>
        <li>bower</li>
        <li>gulp</li>
        <li>A webserver (apache or nginx)</li>
    </ul>
    <h3><small>recommended, but not required:</small></h3>
    <ul>
        <li>Vagrant</li>
        <li>Virtualbox</li>
        <li><a href="#homestead">Laravel Homestead</a></li>
    </ul>

    <h2>Quick start</h2>
    <ol>
        <li>
            <p>Clone the project with this command:</p>
    <pre><code>
    git clone https://rgrissinger@bitbucket.org/rgrissinger/lc-events.git
        </code></pre>
        </li>
        <li>Set up a new mysql database called <strong>lcevents</strong> (for example).</li>
        <li>Configure your webserver & hosts file to serve the <code>~/Code/lc-events/public</code> directory as <code>local.events.com</code> (for example).</li>
        <li>Set up your <code>.env</code> file.  For example, run this from the project root:
<pre><code>
    cp .env.example .env

</code></pre>
            <p>Now Edit your .env appropriately - for example:</p>
    <pre><code>
    DB_DATABASE=lcevents
    DB_USERNAME=homestead
    DB_PASSWORD=secret
        </code></pre>
            <p>There are other settings available here, but the DB settings are all you need for now.</p>
        </li>

        <li>
            <p>You're almost done.  Now run the following commands from the project root:</p>
    <pre><code>
    composer update
    php artisan key:generate
    npm install
    bower install
    gulp
    php artisan migrate --seed
    </code></pre>
        </li>
    </ol>
    <p><strong>That's it!</strong> At this point, you should have a fully functional local copy of the program, complete with a fully built database, sample "seed" data (Users and Events), and all your front-end asset depndencies (jquery/bootstrap) compiled and minified for production.  You can now visit http://local.events.com (or whatever local domain you set up), sign up for events, and... well, please explore for yourself!</p>

    <h3 id="homestead">Laravel Homestead Users</h3>
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

    <p>Once the environment is set up, run these from the project root:</p>
    <pre><code>
    composer update
    php artisan key:generate
    npm install
    bower install
    gulp
    php artisan migrate --seed
        </code></pre>

    <h2>About the Database, Migrations, and Test Data</h2>

    <p>Assuming you used the <code>--seed</code> option on the <code>php artisan migrate</code> command, your database has been populated with <strong>generated</strong> test data.</p>
    <p>This is cool, because it eliminates having to mess with exporting/importing a schema or test database, or having to manually enter records in a bunch of different screens to set up a demo/test environment of the application.</p>
    <h4>Code Example 1:</h4>
    <p>Here's an example from <code>database/seeds/EventsTableSeeder.php</code>:</p>

    <pre><code>factory(App\Event::class,20)->create();</code></pre>

    <p>Crazy simple, right?  The <code>factory()</code> method draws from <code>database/factories/ModelFactory.php</code>:</p>
<?php
$eot=<<<'EOT'
$factory->define(App\Event::class, function (Faker\Generator $faker) {

    $eventTypes = ['Orientation Meeting', 'Trade Show', 'Concert', 'Golf Outing', 'Conference','Opening Ceremony','Product Launch', 'Party','Trade Fair','Retreat','Wedding','Reception','Anniversary Party','Seminar'];

    return [
        'title' => $faker->domainWord.' '.$eventTypes[array_rand($eventTypes)],
        'date' => $faker->dateTimeBetween('-2 years','+2 years')->format('Y-m-d'),
    ];
});
EOT;
?>
    <pre><code>{{$eot}}</code></pre>

    <p>Read more about the fantastic <a href="https://github.com/fzaninotto/Faker">fzaninotto/Faker</a> package.</p>

    <h4>Code Example 2:</h4>
    <p>This code is from <code>database/seeds/EventUserTableSeeder.php</code></p>
    <p>The FIRST user (that is, user_id #1) is assigned to ALL events, and the FIRST event (that is, event id #1) is assigned to ALL users.</p>
    <?php
$eot=<<<'EOT'
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
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>


    <h2>bower, gulp, and elixr</h2>
    <p>Bower is package manager for front end packages.  In this case, we pull in bootstrap and jquery with bower, use elixr to define how we want it compiled (in <code>gulpfile.ls</code>), and then everything is compiled into a single, minified file by running <code>gulp</code>. (Well, two files: one for CSS and one for JS).</p>
    <p>This is great, becuase all we have to include in our <code>resources/views/layouts/master.blade.php</code> file are these compiled files:</p>
    <?php
$eot = <<<"EOT"
<head>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
...
    <script src="/js/app.js"></script>
</body>
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>

    <p>Please explore these files to understand for yourself how this all comes together:</p>
    <ul>
        <li><code>bower.json</code> <-where we define packages to import</li>
        <li><code>resources/assets/sass/main.scss</code> <-where we write our custom css/sass code</li>
        <li><code>gulpfile.js</code> <- where we mix everything together</li>
        <li><code>public/css/app.css</code><- end product to include in our page</li>
    </ul>
    <p></p>
    <p>PS: I regularly use <code>gulp watch</code> so when I make a change to a source file, it's automatically compiled and visible in the browser.</p>
    <h3>More detailed example:</h3>

    <p>This project does not have much in it's gulpfile, but some examples of the next things we might "mix in" could be DataTables, more custom fonts, custom icons, etc.</p>

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