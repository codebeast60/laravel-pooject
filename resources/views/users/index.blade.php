@section('title','users')
@extends('layouts.app')


@section('content')

<h1 class="text-center">hello from users page</h1>
<div class="container ">
    @if (session('success'))
    <div class="alert alert-success text-center w-50 m-auto mb-3">
        {{ session('success') }}
    </div>

    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['country'] }}</td>
                <td><a class="btn btn-primary" href="{{route('users.show',['user' => $user['id']])}}">show</a></td>
                <td><a class="btn btn-success" href="{{route('users.edit',['user' => $user->id])}}">edit</a></td>
                <td>
                    <form action="{{route('users.destroy',['user' => $user->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>

                </td>
                {{-- <td><a class="btn btn-danger" href="{{route('users.destroy',['user' => $user->id])}}">delete</a>
                </td> --}}


            </tr>
        </tbody>

        @endforeach
    </table>
    <a href="{{route('users.create')}}" class="btn btn-success">create new user</a>

</div>


@endsection