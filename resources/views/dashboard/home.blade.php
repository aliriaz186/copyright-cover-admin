@extends('layouts.dashboard')

@section('content')
    <section class="sevices-area" style="margin-top: 30px">
        <div class="container">
            <div class="row justify-content-center">

            </div> <!-- row -->
            <h4 style="text-align: center;margin-top: 30px;margin-bottom: 30px">
                Welcome Admin. Below are some stats of users and certificates.
            </h4>
            <div class="row justify-content-center" style="margin: 0 auto;max-width: 1000px">

                <div class="col-lg-4 col-md-4 col-sm-9">
                        <div style=";padding: 30px;border: 2px solid #6b9ce8;border-radius: 10px" >
                            <h4 class="title" style="padding-top: 0px;text-align: center">Total Users</h4>
                            <p style="text-align: center;font-size: 50px;margin-top: 40px">
                                {{$usersTotal}}+
                            </p>
                        </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-9">
                    <div style=";padding: 30px;border: 2px solid #6b9ce8;border-radius: 10px" >
                        <h4 class="title" style="padding-top: 0px;text-align: center">Total Certificates</h4>
                        <p style="text-align: center;font-size: 50px;margin-top: 40px">
                            {{$certificatesTotal}}+
                        </p>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-9">
                    <div style=";padding: 30px;border: 2px solid #6b9ce8;border-radius: 10px" >
                        <h4 class="title" style="padding-top: 0px;text-align: center">Total Files Protected</h4>
                        <p style="text-align: center;font-size: 50px;margin-top: 40px">
                            {{$certificatesFilesTotal}}+
                        </p>
                    </div>

                </div>




            </div>
        </div>
    </section>
@endsection
