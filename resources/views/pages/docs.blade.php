@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="page-header">
        <h1>Developer Documentation</h1>
        <p class="visible-xs-block alert alert-warning app-errors"><strong>Heads up!</strong> <i class="fa fa-code"></i> Code samples on this page are best viewed on larger screens.</p>
        <p>This page contains installation instructions, code samples, and some thoughts on various aspects of application design.  Please note: The content of this page is technical in nature and was written for the use of developers.</p>
        <p>If you need any help, or have any questions or comments, please contact <a href="mailto:ryan.grissinger@gmail.com">ryan.grissinger@gmail.com</a> at your convenience.</p>
        <p>Thank you!</p>

    </div>
<section id="demo">
    <h2>Demo Website</h2>
    <div class="alert alert-info">
        <p>For ease of use (and extra credit), I deployed a 'production' version of the site:</p>
        <p class="text-center"><a class="btn btn-default" href="http://event-demo.xyz/" target="_blank"><i class="fa fa-external-link"></i> http://event-demo.xyz</a></p>
        <p>Please ask me if you'd to hear more about how I went about that, and/or for more info on any individual pieces of the stack I used to make that happen.</p>
    </div>
</section>

<section id="prerequisites">
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
    </section>

<section id="quick-start">
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

</section>
<section id="homestead">

    <h3>Laravel Homestead Users</h3>
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
    <p>Note that you will need to run database-related commands (such as <code>migrate</code> and <code>db:seed</code>) from within the VM (login with <code>homestead ssh</code> first).</p>
</section>
<section id="database">

    <h2>About the Database, Migrations, and Test Data</h2>
    <h3>Database</h3>
    <p>This solution utilizes Laravel's ORM (also called Eloquent), but it's still SQL doing the work behind the scenes.  The underlying database is a basic mysql database (although this system could easily use other options) with 3 important tables:</p>
    <ul>
        <li>users</li>
        <li>events</li>
        <li>event_user</li>
    </ul>
    <p>Please note that the tables follow a simple naming convention: the names are the lower case, plural form of the corresponding model name (e.g. 'users' is to 'User' as 'events' is to 'Event').</p>
    <p class="alert alert-info">There are a few other tables, too, but they are beyond the scope of this text.</p>

    <h3>Database Integrity</h3>
    <p>The <code>event_user</code> table holds the many-to-many relationship between the <code>User</code> and <code>Event</code> models. (Again, note the naming convention: lowercase, singular nouns, separated by an underscore, and first noun, 'event', is alphabetically before 'user').</p>
    <p>The <code>create_event_user_table</code> migration sets the table structure up properly:</p>
    <pre><code>public function up()
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
}</code></pre>
    <p>Even though there are essentially only 5 lines of code in the middle of this function, there are quite a few things are going on here:</p>
    <ul>
        <li>In short: with few exceptions, every row in a database for objects like <code>Event</code> and <code>User</code> should have a <strong>unique, primary key</strong>, and the columns for <code>event.id</code>, <code>user.id</code>, and thus <code>event_user.event_id</code> and <code>event_user.user_id</code> should all be most correctly <strong>unsigned integers</strong>.  I've worked on projects without <strong>any</strong> primary keys on similar tables, or keys that are varchars... both problematic situations.  I've heard the argument in the past that, "It doesn't matter, because is highly unlikely that a negative number would ever be passed into this table."  But I say, why not take a moment to do it the right way?  In this code, the simple call to <code>->unsigned()</code> guarantees that the column can only contain a positive number.  If we ever need to deal with an advanced joins and/or millions of rows, we will not encounter the performance/indexing problems or mysteriously "disappearing" data that can arise with improper or missing keys.</li>
        <li>Although not required for the table to function, the foreign key relationships with the <code>event</code> and <code>user</code> tables are formally defined here, and additionally improve performance and guarantee referential integrity.</li>
        <li>The calls to <code>->onUpdate('cascade')</code> and <code>->onDelete('cascade')</code> guarantee that when a <code>User</code> or <code>Event</code> model are updated or deleted, so too will the associated rows in this table.  For example, if Event #123 is deleted, we will never have an error in client code trying to look up a row like (123,1) in this table (such a row would also have been deleted when Event #123 was deleted).</li>
        <li>The table has a <strong>composite primary key</strong> which guarantees that only one row like (1,1) can exist.</li>
    </ul>
    <p>Regarding that last one: let's consider this (abridged) code from the Event Controller, <code>app/Http/Controllers/EventController.php</code>:</p>

    <?php
    $eot=<<<'EOT'
function postSignup(Request $request){

    $event = Event::findOrFail($request['event_id']);
    $user = User::byEmail($request['email'])->first();

    $user->events()->detach($event->id);
    $user->events()->attach($event->id);

}
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>
    <p>You might ask, why are we running <code>detach()</code> here?</p>
    <p>Consider the possibility that <strong>user 1</strong> was already signed up for <strong>event 123</strong>...</p>

    <p>Under normal circumstances, if we try to pass INSERT (123,1) in here, we would get an error like:</p>
    <pre><code>#1062 - Duplicate entry '123-1' for key 'PRIMARY'</code></pre>
    <p>By calling <code>->detach()</code>, we are essentially running a command like this:</p>
    <pre><code>DELETE * FROM event_user WHERE event_id = 123 AND user_id = 1</code></pre>
    <p>Then, when we run <code>->attach()</code>, this can run without generating an integrity error:</p>
    <pre><code>INSERT INTO event_user(event_id,user_id) VALUES (123,1);</code></pre>

    <p>An alternative approach would be to use a <code>try/catch</code> block here, which would allow us an opportunity to show the user a message that they were already signed up, for example.</p>

    <h3>Migrations</h3>
    <p>Migrations are like <strong>version control for the database</strong>.  This is very powerful, considering the pain that can be encountered without it.  When you run <code>php artisan migrate</code>, the system builds the tables according to the schema defined in the <code>database/migrations</code> directory.</p>
    <p>If Developer A makes a change to the database schema, he/she commits a new migration.  Then Developer B pulls the code, runs <code>php artisan migrate</code>, and their schema's are always in sync.</p>
    <p>Furthermore, when the code is deployed to the server, the <code>migrate</code> command applies the appropriate changes there as well.</p>
    <p><strong>Example:</strong> Here's how the event table is defined in the <code>create_events_table</code> migration:</p>
    <?php
    $eot=<<<'EOT'
Schema::create('events', function (Blueprint $table) {
    $table->increments('id');
    $table->string('title');
    $table->date('date');
    $table->timestamps();
});
EOT;
    ?>
    <p>It's very easy to understand what this code does.  See the <a href="https://laravel.com/docs/5.2/migrations" target="_blank"><i class="fa fa-external-link"></i> Laravel Docs on migrations</a> for more info.</p>
    <pre><code>{{$eot}}</code></pre>
    <h3>Seed Data</h3>
    <p>If you run <code>php artisan db:seed</code>, or use the <code>--seed</code> option on the <code>php artisan migrate</code> command, your database will have been populated with <strong>generated</strong> test data, as defined in the <code>database/seeds</code> directory.</p>
    <p>Without using something like this, we have to mess with exporting/importing a schema or test database, or having to manually enter records in a bunch of different UI screens to set up a demo/test environment of the application (or to process/test changes).  This is cool, because it eliminates having to mess with any of that.  A huge time-saver!</p>
    <h4>Example 1: Events</h4>
    <p>Here's an example from <code>database/seeds/EventsTableSeeder.php</code>:</p>

    <pre><code>//create 20 events
factory(App\Event::class,20)->create();</code></pre>

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

    <p>PS: We currently have the 'production' environment set up to refresh every time we push to the master branch.</p>
    <h4>Example 2: Events to Users</h4>
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

    <?php
    $user = App\User::with(['events'=>function($query){
        $query->select('id');
    }])->first();
    $event = App\Event::with('attendees')->first();
    ?>
    <p>Right now, the first user, <strong>{{$user->first_name}} {{$user->last_name}}</strong>, has <span class="badge badge-default">{{$user->events->count()}}</span> events.</p>
    <p>The 'first' event, <strong>{{$event->title}}</strong>, has <span class="badge badge-default">{{$event->attendees->count()}}</span> attendees.</p>

    <p>Just to review:</p>
    <ul>
        <li><code>php artisan migrate</code><- run the most recent (or initial) migrations</li>
        <li><code>php artisan db:seed</code><- run the seeders</li>
        <li><code>php artisan migrate --seed</code> <- run the seeder automatically after the migration</li>
        <li><code>php artisan migrate:refresh --seed</code> <- wipe everything clean, then migrate & reseed</li>
    </ul>
</section>
<section id="front-end-packages">
    <h2><span class="label label-success">BONUS!</span> bower, gulp, and elixr</h2>
    <p>Bower is package manager for front end packages.  In this case, we pull in bootstrap, jquery, and font-awesome with bower, use elixr to define how we want it compiled (via <code>gulpfile.js</code>), and then everything is compiled into a single, minified file by running <code>gulp</code>. (Well, two files: one for CSS and one for JS).</p>
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

    <p>This project does not have much in it's gulpfile, but some examples of the next things we might "mix in" could be js libraries, more custom fonts, custom icons, etc.</p>
</section>
<section id="laravel">

    <h2><span class="label label-success">BONUS!</span> Dates: Future/Previous Events</h2>
    <p>Let's talk for a moment about one way to deal with how to deal with "Previous" vs. "Future" events.  This application uses a few laravel features to make it happen quickly, easily, and efficiently.</p>

    <h3>Query Scopes</h3>
    <p>Here's a code sample from <code>app/Http/Controllers/EventController.php @index</code>:</p>
    <pre><code>$previous_events = Event::past()->get();
            $future_events = Event::future()->get();</code></pre>
    <p>Easy, right?  Let's see what's going on in the Event model, <code>app/Event.php</code>:</p>
    <?php
    $eot = <<<'EOT'
public function scopeFuture($query)
{
    return $query->orderBy('date','asc')->where('date','>=',date('Y-m-d'));
}

public function scopePast($query)
{
    return $query->orderBy('date','desc')->where('date','<',date('Y-m-d'));
}

public function scopeToday($query)
{
    return $query->where('date','=',date('Y-m-d'));
}
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>

    <p>So just to elaborate on one of the three... on April Fool's Day, the <code>scopeFuture()</code> method generates SQL that looks something like this:</p>
    <pre><code>SELECT * FROM events WHERE date >= '2016-04-01'</code></pre>
    <p>Here's another example: the <code>User</code> model <em>indirectly</em> uses this same function when we ask for <code>$user->futureEvents();</code>.  This following code lives in <code>app/User.php</code>:</p>
    <pre><code>public function events()
{
    return $this->belongsToMany('App\Event');
}

public function futureEvents()
{
    return $this->events()->future();
}</code></pre>

    <p>It's so simple... so elegant... so self-explanatory.  But I'll try to explain here anyway.  The <code>User</code> model looks to it's related <code>Event</code> model via the <code>belongsToMany</code> relationship, and asks the Event for it's future events... so the SQL that runs might look something like this:</p>

<pre><code>
    SELECT events.*, users.* FROM event_user
    JOIN users on event_user.user_id = users.id
    JOIN events on event_user.event_id = events.id
    WHERE user_id = 1
    AND events.date >= '2016-04-01'
</code></pre>

</section>
<section id="performance">


    <h2><span class="label label-success">BONUS!</span> Performance</h2>
    <h3>Eager Loading of related models</h3>
    <p>Let's bring this home with one more example, building on what we have so far.  Let's say we wanted a list of users WITH their future events...</p>
    <p>Consider this code:</p>
<pre><code>$users = User::all();
foreach($users as $user){
    $user->futureEvents()->get();
}</code></pre>
    <p>If you had 100 users, that code would run 100 queries, right? (Actually, 101).</p>
    <p>Well, here is a much more efficient way of doing it:</p>
<pre><code>$users = User::with('futureEvents')->get();
foreach($users as $user){
    $events = $user->futureEvents;
    //do something with the events
}
</code></pre>
    <p>Our system only ran TWO queries. The results would include 100 users like this:</p>
    <?php
    $eot=<<<'EOT'
App\User {#674
 id: 2,
 first_name: "Gertrude",
 last_name: "O'Connell",
 phone: "(114)530-6010x14635",
 email: "Emerald.Huels@example.com",
 created_at: "2016-04-08 02:45:19",
 updated_at: "2016-04-08 02:45:19",
 futureEvents: Illuminate\Database\Eloquent\Collection {#672
   all: [
     App\Event {#726
       id: 1,
       title: "Waelchi Anniversary Party",
       date: "2016-08-24",
       created_at: "2016-04-08 02:45:19",
       updated_at: "2016-04-08 02:45:19",
       pivot: Illuminate\Database\Eloquent\Relations\Pivot {#701
         user_id: 2,
         event_id: 1,
       },
     },
   ],
 },
},
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>
    <p>On the one hand, this is great because we only have 2 querys vs. 101... however, there may be a downside, depending on the use case.  This approach makes our response much larger, which may not be good if we are dealing with a lot of records.  Or consider multiple and/or deeply nested relational data, if we pulled 1000 users with 100 events each... or consider what would happen if the events table had a bunch more data, i dunno, maybe pictures, or long descriptions or something.  That could be a lot of wasted bandwidth and processing power.</p>
    <p>If all we wanted was a count, we could just do something like this:</p>

<pre><code>$user = App\User::with(['futureEvents'=>function($query){
    $query->select('id');
}])->get();</code></pre>

    <p>This code says, "give me all the User info, but only the futureEvent's id's."</p>
    <p>Now our response looks like this:</p>
    <?php
    $eot=<<<'EOT'
App\User {#828
 id: 2,
 first_name: "Gertrude",
 last_name: "O'Connell",
 phone: "(114)530-6010x14635",
 email: "Emerald.Huels@example.com",
 created_at: "2016-04-08 02:45:19",
 updated_at: "2016-04-08 02:45:19",
 events: Illuminate\Database\Eloquent\Collection {#829
   all: [
     App\Event {#708
       id: 1,
       pivot: Illuminate\Database\Eloquent\Relations\Pivot {#900
         user_id: 2,
         event_id: 1,
       },
     },
   ],
 },
},
EOT;
    ?>
    <pre><code>{{$eot}}</code></pre>
    <p>Note the nested <code>event</code> data ONLY contains an <code>id</code>, rather than a 'full' object.</p>

</section>
<section id="final-thoughts">

    <h2>Final Thoughts</h2>
    <p>Well, I set out with the goal of quickly producing code that not only gets the job done, but is very easy to read, maintain, and extend later.</p>
    <p>I have more to say about Security, Design, Project Management, Requirements Analysis, and more... perhaps I will have a chance to add to this page one day, but I hope you can tell that I put some effort into it.</p>
    <p>Just in case, here's a  button leading to the solution: <a class="btn btn-lg btn-primary" href="/event/{{$next_event->id}}/register"><i class="fa fa-plus"></i> Sign Up for the next Event</a></p>
    <p>Thank you again for your time and consideration!</p>
</section>

@endsection
