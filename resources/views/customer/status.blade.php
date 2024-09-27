@extends('layouts.customer')
@section('head')
    
@endsection
@section('content')
    <p>status</p>
    <table class="table" style="width: 60%; ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            {{-- <th scope="col">description</th> --}}
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($status as $ticket)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$ticket->title}}</td>
                {{-- <td>{{$ticket->description}}</td> --}}
                <td>{{$ticket->status}}</td>
              </tr>
            @endforeach
          
        </tbody>
      </table>
@endsection