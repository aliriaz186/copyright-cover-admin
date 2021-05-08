@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{--    <div>--}}
    <div class="container" style="max-width: 1200px;margin-top: 30px;margin-bottom: 50px">
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
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">ALL USERS</h3>
        <p style="font-size: 13px;">Below is a list of all registered/subscribed users.</p>
        <div class="px-5 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>DATE JOINED</th>
                    <th>EMAIL</th>
                    <th>SUBSCRIPTION EXPIRY</th>
                    <th>OPTIONS</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) != 0)
                    @foreach($users as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->first_name ?? ''}} {{$item->last_name ?? ''}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->subscription->subscription_expiry}}</td>
                            <td>

                                <button onclick="setName(`{{$item->first_name ?? ''}} {{$item->last_name ?? ''}}`, `{{$item->email}}`,`{{$item->created_at}}`,`{{$item->subscription->subscription_expiry}}`,`{{$item->company_name}}`,`{{$item->address}}`,`{{$item->city}}`,`{{$item->state}}`,`{{$item->country}}`,`{{$item->telephone}}`,`{{$item->profession}}`,`{{$item->postal_code}}`)"  data-toggle="modal" data-target="#myModal" class="btn btn-info" >VIEW PROFILE</button>
                                @if($item->active == 1)
                                    <a class="btn btn-danger" href="{{url('/block-user/'.$item->id)}}">BLOCK</a>

                                @else
                                    <a class="btn btn-success" href="{{url('/unblock-user/'.$item->id)}}">UNBLOCK</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td></td>
                        <td class="text-center">No Users Found Yet!</td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="resetheading"></h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Email</h5>
                            <p id="uemail"></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Phone</h5>
                            <p id="uphone"></p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <h5>Date Joined</h5>
                            <p id="udatejoined"></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Subscription Expiry</h5>
                            <p id="usubscriptionexpiry"></p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <h5>Company</h5>
                            <p id="ucompany"></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Address</h5>
                            <p id="uaddress"></p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <h5>Postal Code</h5>
                            <p id="upostalCode"></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>City</h5>
                            <p id="ucity"></p>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <h5>State</h5>
                            <p id="ustate"></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Country</h5>
                            <p id="ucountry"></p>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <h5>Profession</h5>
                            <p id="uprofession"></p>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function setName(name, email, datejoined, subscriptionexpiry, company, address, city, state, country, phone, profession, postalCode) {
            document.getElementById('resetheading').innerText = name + ' Profile';
            document.getElementById('uemail').innerText = email;
            document.getElementById('udatejoined').innerText = datejoined;
            document.getElementById('usubscriptionexpiry').innerText = subscriptionexpiry;
            document.getElementById('ucompany').innerText = company;
            document.getElementById('uaddress').innerText = address;
            document.getElementById('ucity').innerText = city;
            document.getElementById('ustate').innerText = state;
            document.getElementById('ucountry').innerText = country;
            document.getElementById('uphone').innerText = phone;
            document.getElementById('uprofession').innerText = profession;
            document.getElementById('upostalCode').innerText = postalCode;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
// Prepare the preview for profile picture
            $("#photo").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photopreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
