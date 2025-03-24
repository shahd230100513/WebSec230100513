<nav class="navbar navbar-expand-sm bg-light">
    {{-- <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) --> --}}
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./even">Even Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./prime">Prime Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./multable">Multiplication Table</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./marketbill">Supermarket bill</a>
            </li>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./transcript">Transcript</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./calculator">Calculator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./gpa-simulator">GPA Simulator</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./products/list">Products List</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">{{ auth()->user()->name }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('doLogout') }}">Logout</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>
