@extends('auth.layouts.master')
@section('title', 'فراموشی رمز عبور')

@section('content')



<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('auth/assets/images/img-01.png') }}" alt="IMG">
            </div>



            <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                    Forget Password
                </span>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>

                @if($errors->any())
                <div class="mb-2 alert alert-danger"> <small class="form-text text-danger error-fa">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </small> </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Send
                    </button>
                </div>



                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection