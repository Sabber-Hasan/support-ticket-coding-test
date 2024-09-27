@extends('layouts.customer')
@section('content')
<div class="card">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">write yor issues</h5>
      <p class="card-text">we are always open to try to slove your problem</p>
      <a href="{{ route('ticket') }}" class="btn btn-primary">open a ticket</a>
    </div>
  </div>
@endsection