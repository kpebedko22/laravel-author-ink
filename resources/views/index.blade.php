@extends('layouts.master')
@section('title', 'Authors & Books')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            Authors & Books


            <a href="{{ url('admin/account') }}">Go account</a>
            <a href="{{ url('admin/sign-in') }}">Go sign in</a>
            
            @yield('sign-in')
            @yield('account')
            @yield('books.index')
            
        </div>
    </div>
</div>

@endsection