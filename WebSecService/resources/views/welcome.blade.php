@extends('layouts.master')
@section('title', 'Home')
@section('content')
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<script>
 function doSomething() {
   alert("Welcome to Web Sec Service!");
 }
</script>

 {{-- <script>
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
    <button type="button" id="btn1" class="btn btn-primary" >Press Me</button>
    <button type="button" id="btn2" class="btn btn-success" style="display: none;" >Press Me Again</button>
    <ul id="ul1">
    </ul>
  </div>
 </div> --}}
 
<div class="card m-4">
 <div class="card-body">
    <div class="d-flex justify-content-center">
      <h1>Welcome to Home Page!</h1>
    </div>
  <div class="d-flex justify-content-center">
     <button type="button" class="btn btn-primary" onclick="doSomething()">Press Me</button>
  </div>
 </div>
</div>
@endsection