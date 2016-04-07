<html>
<head>
    <title>LC Events - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.

    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/event">Events</a></li>
        <li><a href="/user">Users</a></li>
    </ul>
@show

<div class="container">
    @yield('content')
</div>

@section('footer')

    This is the master footer.
    <ul>
        <li><a href="/about">about</a></li>
        <li><a href="/terms">terms & conditions</a></li>
    </ul>
@show
</body>
</html>