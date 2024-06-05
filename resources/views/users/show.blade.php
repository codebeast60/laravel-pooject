@section('title','show')
@extends('layouts.app')


@section('content')

<h1 class="text-center">hello from show page</h1>

{{ $user['id'] }}
{{ $user['name'] }}
{{ $user['country'] }}


@endsection