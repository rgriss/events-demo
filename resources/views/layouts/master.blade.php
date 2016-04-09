<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LC Events - @yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>



@section('nav')

        <!-- Static navbar -->
<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">
                <img class="logo pull-left" src="https://www2.lifestylecommunities.com/img/lc-logo.png" alt="LC">Event Demo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/event">Events</a></li>
                <li><a href="/user">Users</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

@show

<div class="container">
    {{--Include error messages--}}
    @include('common.errors')

    @yield('content')
</div>

@section('footer')
<footer class="footer">
<div class="container">
    <ul class="nav nav-pills">
        <li><a href="/about">about</a></li>
        <li><a href="/terms">terms & conditions</a></li>
    </ul>
</div>
</footer>
@show

<script src="/js/app.js"></script>
<script>
    $(document).on('load',function(){
        console.log("HELLO");
    });
</script>
</body>
</html>