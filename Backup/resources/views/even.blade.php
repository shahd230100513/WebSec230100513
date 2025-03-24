@extends('layouts.master')
@section('title', 'Even Numbers')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <h3>Even Numbers</h3>
        <p>Below is a list of even numbers from 1 to 100:</p>
    </div>
    <div class="card-body">
      @foreach (range(1, 100) as $i)
        @if($i%2==0)
          <span class="badge bg-primary">{{$i}}</span>  
        @else
          <span class="badge bg-secondary">{{$i}}</span>  
        @endif
      @endforeach
    </div>
</div>
@endsection