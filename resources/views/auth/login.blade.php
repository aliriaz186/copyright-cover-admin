@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->
@section('content')
    <section class="login-area singup-area" style="margin-bottom: 100px">
{{--        <div class="login-bg">--}}
{{--            <div class="login-shape">--}}
{{--                <img src="{{url('')}}/assets/images/shapes/login-shape.png" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}


        <form method="post" action="{{url("/login-user")}}">
            {{csrf_field()}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title">
                            <h2 style="text-align: center;color: #6b9ce8">MEMBER LOGIN</h2>
                            <div style="margin: 0 auto;max-width: 100px">
                                <div style="border-bottom: 3px solid #6b9ce8;width: 100px" >

                                </div>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success" style="margin-bottom: 0px!important;margin-top: 10px">
                                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                </div>
                            @endif
                            <p style="margin-top: 30px;color: black;font-weight: bold;font-size: 16px!important;">Please enter your registered email address and your password below.</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="email" placeholder="Email*" name="email" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="password" name="password" placeholder="Password*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-3 mt-30">
                        <button type="submit"
                                style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>


@endsection
<!--====== LOGIN PART ENDS ======-->
