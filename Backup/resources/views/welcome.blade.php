@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        function doSomething() {
            alert("Welcome to Web Sec Service!");
        }

        $(document).ready(function(){
            $("#btn1").click(function(){
                $("#btn2").show();
            });

            $("#btn2").click(function(){
                $("#ul1").append("<li>Hello</li>");
            });
        });
    </script>

    <div class="card m-4">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <!-- Add the navigation bar here -->
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/even') }}">Even Number</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/prime') }}">Prime Number</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/multitable') }}">Multiplication Table</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/supermarketbill') }}">Supermarket bill</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/calculator') }}">Calculator</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/gpa-simulator') }}">GPA Simulator</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.list') }}">Products List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                </ul>
            </div>

            <h1>Welcome to Dashboard Page!</h1>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" onclick="doSomething()">Press Me</button>
            </div>
        </div>
    </div>
@endsection