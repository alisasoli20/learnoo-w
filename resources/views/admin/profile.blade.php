@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12 text-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4">
                <h4 style="font-weight: bold;font-family: sans-serif;"> Web Components Changing </h4>
            </div>
            <div class="col-md-12">
                <form id="logo" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-2">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Logo (Size:60X80 )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="logo" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button  type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="page_image" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="form-group row mt-4">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Welcome Page image (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="welcome_page_image" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button  type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-2">
                <h4 style="font-weight: bold;font-family: sans-serif;"> Advertisement Changing </h4>
            </div>
            <div class="col-md-12">
                <form id="advertisement_1" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-4">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 1 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_1" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="advertisement_2" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 2 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_2" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="advertisement_3" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 3 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_3" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="advertisement_4" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 4 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_4" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="advertisement_5" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 5 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_5" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="advertisement_6" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Advertisement 6 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="advertisement_6" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <a href="" type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12 mt-4">
                <form id="partner1" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Partner 1(Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="partner_1" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button href="" type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="partner2" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Partner 2 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="partner_2" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <form id="partner3" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Partner 3 (Size:....X.... )* </label>
                        <div class="col-md-4">
                            <input type="file"  name="partner_3" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <button type="submit"  class="btn col-md-3 btn-block" style="background-color: #3672D9;color:white;"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-1 mt-2">
                <h4 style="font-weight: bold;font-family: sans-serif;"> Password Changing </h4>
            </div>
            <div class="col-md-12">
                <form id="reset_password_form" class="p-0 m-0" method="POST" action="{{ route('reset.password') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Search By* </label>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control"  placeholder ="" id="search_by">
                                    <option value="email">Email Address</option>
                                    <option value="id">ID Number</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;"> </label>
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" id="q" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn" style="border:1px solid  rgba(121, 121, 121, 1);background-color: rgba(255, 255, 255, 1);color:black;" id="search"> Search </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Result </label>
                        <div class="col-md-5">
                            <input type="text" name="email" class="form-control" readonly id="result" placeholder="" style="outline: none;box-shadow: none;border-radius: 0px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;"> </label>
                        <div class="col-md-6">
                            <input type="text" name="security_password" class="form-control" readonly id="security_password" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Answer* </label>
                        <div class="col-md-5">
                            <input type="text" name="security_answer" class="form-control" id="institute_Security_answer" placeholder="Security Answer" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;"> New Password* </label>
                        <div class="col-md-5">
                            <input type="password" name="password" class="form-control" id="institute_Password" placeholder="Password" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 offset-md-2 col-form-label" style="font-family: sans-serif;font-weight: bold;">Confirm New Password* </label>
                        <div class="col-md-5">
                            <input type="password" name="password_confirmation" class="form-control" id="institute_Retype-Password" placeholder="Retype-Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9  d-flex justify-content-end">
                            <button type="submit" id="institute_btn_signup" class="btn " style="background-color:#3672D9;color:white;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('page-scripts')
    <script>
        $("#search").click(function() {
            var searchBy = $('#search_by').find(":selected").val()
            var searchParameter = $('#q').val()
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "{{ route('get.user.data') }}",
                data: {"_token":CSRF_TOKEN, "searchBy": searchBy, "q": searchParameter},
                success: function (data){
                    var data = JSON.parse(data)
                    if(typeof data != "string") {
                        $('#result').val(data.email)
                        $('#security_password').val('Your Security Question is: ' + data.security_question.question)
                    }else{
                        alert(data)
                    }
                }
            })
        })

    </script>
@endsection
