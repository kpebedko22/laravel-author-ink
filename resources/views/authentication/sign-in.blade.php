@extends('index')


@section('sign-in')
<h1>Hello</h1>

@if ($message = Session::get('error'))
<p>{{ $message }}</p>
@endif

@if (count($errors) > 0)
@foreach ($errors as $error)
<p>{{ $error }}</p>
@endforeach
@endif

<form method="post" action="{{ url('admin/sign-in') }}">
    @csrf
    <input type="email" name="email" id="">
    <input type="password" name="password" id="">
    <input type="submit" value="login">
</form>
@endsection