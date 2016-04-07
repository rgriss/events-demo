<html lang="en">
<head>
    <title>LC Events - @yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">

    <style>
        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 40px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>



@section('nav')

        <!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Event Demo</a>
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