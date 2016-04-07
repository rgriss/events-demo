@extends('layouts.master')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h1>How i built this</h1>
    from my local machine...

    <pre><code>
            cd ~/Code
            laravel new lc-events
        </code></pre>

    <p>I copied <code>.env.example</code> to <code>.env</code></p>

    *If you copy this for your own local use, you will need to configure your local environment.  Assuming you have Laravel Homestead set up, it's as easy as editing your homestead.yaml file and your local /etc/hosts, then updating the database credentials in your .env file.  Please ask me if you need assistance.
    <p>again, from the command line:</p>
    <pre><code>
            php artisan key:generate
            composer update
            npm install
        </code></pre>

    <p>That's about all it takes to get started.</p>

    <pre><code>
            git init
            git remote add origin git@bitbucket.org:rgrissinger/lc-events.git
            git push -u origin master
        </code></pre>

    <h2>Laravel</h2>
    <h3>Homestead</h3>
    <p>for example, configure your local /etc/hosts file to point local.events.com to the homestead ip address</p>
    <p>edit the homestead.yaml file</p>
    <p>edit the .env file</p>

    <h3>elixr</h3>
    <p>elixr helps to compile assets like js and css files into a production-ready state.</p>

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