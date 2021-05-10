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
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">Edit Tips Page</h3>
        <div class="px-5 table-responsive">
            <form action="{{url('/update-text')}}" method="post">
                @csrf
                <textarea class="form-control" rows="6" cols="100" name="text" id="guide" style="height: 800px">{{$data->text}}</textarea>
                <input type="hidden" name="type" value="tips">
                <br>
                <button class="btn btn-success" type="submit">UPDATE</button>
            </form>
        </div>
    </div>
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
