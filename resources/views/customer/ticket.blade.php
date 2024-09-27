@extends('layouts.customer')
@section('head')
    <style>
        form {
            border: solid black 2px;
            margin: 1% 25%;
            padding: 5px 40px;
            text-align: center
        }
    </style>
@endsection
@section('content')
    <p>welcome</p>
    <div>
        <form method="POST" action="{{ route('ticket.store') }}">
            @csrf
           
                <input type="text" id="title" name="title" placeholder="title"><br> <br> <br>
                <h4>description</h4>
                <textarea name="description" id="description"  cols="30" rows="10"></textarea><br>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="submit" value="Submit">
              
        </form>
    </div>
@endsection