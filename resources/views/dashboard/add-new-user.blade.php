@extends('layouts.dashboard')
<!--====== LOGIN PART START ======-->


@section('content')
        <form method="post" action="{{url("/register-user")}}" onsubmit="return validateForm()" style="padding: 30px">
            {{csrf_field()}}
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6">
                        <div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success" style="margin-bottom: 0px!important;">
                                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                </div>
                            @endif

                            <h2>Register New User</h2>
                            <div style="margin: 0 auto;max-width: 100px">
                            </div>
                            <div class="trustedsite-trustmark" data-type="211" data-width="160"  data-height="66"></div>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="First Name*" name="firstName" id="firstname">
                            </div>
                            <br>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Last Name*" name="lastName" id="lastname">
                            </div>
                            <br>
                            <div class="input-box mt-30">
                                <input type="email" placeholder="Email Address*" name="emailAddress" id="emailAddress">
                            </div>
                            <br>
                            <div class="input-box mt-30">
                                <input type="password" placeholder="Password*" name="password" id="password">
                            </div>
                            <br>
                            <div class="input-box mt-30">
                                <input type="password" placeholder="Confirm password*" name="confirmpassword" id="confirmpassword">
                            </div>
                            <br>
                            {{--                            <div class="input-box mt-30">--}}
                            {{--                                <input type="text" placeholder="Company Name" name="companyName">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    {{--                    <div class="col-lg-6">--}}
                    {{--                        <div class="login-form">--}}
                    {{--                            --}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>

            <div class="container">

                <div style="width: 250px;color: white;padding: 10px;display: none;margin-top: 20px;background-color: maroon" id="errorMessageDiv">

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3 mt-30">

                        <button id="submitbtnmain" type="submit"
                                style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </div>
        </form>

    <script>
        function validateForm()
        {
            let firstname = document.getElementById('firstname').value;
            let lastname = document.getElementById('lastname').value;
            let emailAddress = document.getElementById('emailAddress').value;
            let password = document.getElementById('password').value;
            let confirmpassword = document.getElementById('confirmpassword').value;
            // let addressLineOne = document.getElementById('addressLineOne').value;
            // let city = document.getElementById('city').value;
            // let zipcode = document.getElementById('zipcode').value;
            // let state = document.getElementById('state').value;
            // let selectCountry = document.getElementById('selectCountry').value;
            // let telephone = document.getElementById('telephone').value;
            // let profession = document.getElementById('profession').value;
            document.getElementById('errorMessageDiv').style.display = 'none';
            if (firstname === undefined || firstname === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'First Name is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (lastname === undefined || lastname === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Last Name is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (emailAddress === undefined || emailAddress === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Email Address is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (password === undefined || password === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Password is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (confirmpassword === undefined || confirmpassword === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Confirm password is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (confirmpassword !== password){
                document.getElementById('errorMessageDiv').innerHTML = 'Password Mismatch';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            return true;
        }

    </script>
@endsection
