@extends('layouts.admin')
@section('content')
    <h1>User</h1>

    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Create</a>
    <table class="table table-dark table-striped-columns table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                        
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


