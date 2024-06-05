@section('title','create-new-user')
@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger text-center">
        @foreach ($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
    </div>


    @endif
    <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="mb-3  ">
            <label for="exampleInputEmail1" class="form-label">name</label>
            <input type="text" name="username" class=" form-control w-25 " id="exampleInputEmail1"
                value="{{ old('username')}}" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">country</label>
            <input type="text" name="country" class="form-control w-25" id="exampleInputPassword1"
                value="{{ old('country')}}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection