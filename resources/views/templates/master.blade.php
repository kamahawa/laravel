<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery-2.1.4.min.js') }}"></script>
    @yield('jsAndCss')
</head>
<body>
<header>
    <ul id="dropdown">
        <li>
            <a href="{{url('/')}}/home">Home Busmanage</a>
            <a href="{{url('/')}}/logout" style="float: right; margin-right: 10px">LogOut</a>
            <a style="float: right;margin-right: 20px;">Wellcome {{Auth::user()->UserName}}</a>
        </li>
        <li>
            <div>
                <a href="{{url('/')}}/user">User</a>
                <a href="{{url('/')}}/vehicle">Vehicle</a>
                <a href="{{url('/')}}/student">Student</a>
                <a href="{{url('/')}}/group">System Group</a>
                <a href="{{url('/')}}/point">System Point</a>
                <a href="{{url('/')}}/route">System Route</a>
                <a href="{{url('/')}}/location">Location</a>
                <a href="{{url('/')}}/pickup">Pick Up</a>
            </div>
        </li>
    </ul>
</header>
	@yield('content')
</body>
</html>