@extends('admin.layouts.login')

@section('title')
    {{ 'Login' }}
@endsection

@section('content')

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                         class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('admin.auth.login') }}">
                        @csrf
                        @method('POST')

                        <div class="form-outline mb-4">
                            @component('admin.components.login.input',[
                                'type' => 'email',
                                'name' => 'email',
                                'label' => 'Email',
                                'value' => old('email'),
                            ])@endcomponent
                        </div>

                        <div class="form-outline mb-4">
                            @component('admin.components.login.input',[
                                'type' => 'password',
                                'name' => 'password',
                                'label' => 'Password',
                                'value' => '',
                            ])@endcomponent
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       value=""
                                       id="remember"
                                       name="remember"
                                       checked
                                />
                                <label class="form-check-label" for="remember"> Remember me </label>
                            </div>
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-lg btn-block w-100"
                        >{{ 'Sign in' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
