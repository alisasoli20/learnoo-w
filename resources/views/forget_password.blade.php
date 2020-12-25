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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Reset Your Password</h2>
            </div>
        </div>
        <div class="row mt-4">
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
