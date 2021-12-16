@extends('index')


@section('account')

<h1>Account</h1>
<h1>{{ $username }}</h1>

<a href="{{ url('admin/sign-out') }}">sign-out</a>

@endsection
