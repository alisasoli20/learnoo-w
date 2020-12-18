@extends('layouts.app')
@section('content')
    <div class="row mt-1">
        <div class="col-md-5" id="image_box">
            <img src="{{ asset('img/welcome_image.png') }}" height="auto" width="auto">
        </div>
        <div class="col-md-7" >
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <div class="row" >

                <div class="col-md-6">
                    <button type="button" id="btn_login" class="btn btn-block " style="background-color: #FD0585;">Login As a Candidate</button>
                </div>
                <div class="col-md-6">
                    <button type="button" id="btn_signup" class="btn btn-block" style="background-color: #FD0585;">Register As a Candidate</button>
                </div>
            </div>
            <form id=loginform action="{{ route('student.login') }}" method="POST">
                @csrf
                <div class="form-group row mt-4">
                    <label for="staticEmail" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Email* </label>
                    <div class="col-md-8">
                        <input type="text" name="email"  class="form-control" id="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Password* </label>
                    <div class="col-md-8 ">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit"  class="btn btn-block " style="background-color: #FD0585;">Log In</button>
                    </div>
                </div>
            </form>
            <form id="signupform" class="p-0 m-0" method="POST" action="{{ route('student.register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mt-4">
                    <label for="staticEmail" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Name* </label>
                    <div class="col-md-8">
                        <input type="text" name="name"  class="form-control" id="" placeholder="Name" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">StudentId* </label>
                    <div class="col-md-8">
                        <input type="text" name="student_id" class="form-control" id="StudentId" placeholder="StudentId" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Email* </label>
                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control" id="Email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Country* </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="country" class="form-control" id="sel1" placeholder = "Select a Country" required>
                                <option selected disabled>Select Country</option>
                                @foreach(Countries::getList('en','php') as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Telephone No* </label>
                    <div class="col-md-8">
                        <input type="tel" name="phone" class="form-control" id="Telephone_no" placeholder="Telephone No" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Select a Security Question* </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="security_question" class="form-control" id="sel1" placeholder = "Select a Security Question" required>
                                <option selected disabled>Select your security question</option>
                                <option value="1">What was the house number and street name you lived in as a child?</option>
                                <option value="2">What were the last four digits of your childhood telephone number?</option>
                                <option value="3">What primary school did you attend?</option>
                                <option value="4">In what town or city was your first full time job?</option>
                                <option value="5">In what town or city did you meet your spouse or partner?</option>
                                <option value="6">What is the middle name of your oldest child?</option>
                                <option value="7">What are the last five digits of your drivers license number?</option>
                                <option value="8">What is your grandmother's(on your mother's side) maiden name?</option>
                                <option value="9">What is your spouse or partner's mother's maiden name?</option>
                                <option value="10">In what town or city did your parents meet?</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Answer* </label>
                    <div class="col-md-8">
                        <input type="text" name="security_answer" class="form-control" id="Security_answer" placeholder="Security Answer" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;"> Password* </label>
                    <div class="col-md-8">
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Retype Password* </label>
                    <div class="col-md-8">
                        <input type="password" name="password_confirmation" class="form-control" id="Retype-Password" placeholder="Retype-Password" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Upload Your ID* </label>
                    <div class="col-md-8">
                        <input type="file" name="id_photo" class="form-control" required>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" id="btn_signup" class="btn btn-block" style="background-color: #FD0585;">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2" >
            <h2 class="text-center "> Recent 100 Modules </h2>
            <h2 id="text-heading" class="offset-md-4"> </h2>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary m-md-2"> Admin Profile </button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="text-center"> Module II </h6>
                    <p class="text-center"> Institute E </p>
                    <h2 class="text-center offset-md-3" id="Module_underline"> </h2>
                </div>
                <div class="col-md-3">
                    <h6 class="text-center"> Module II </h6>
                    <p class="text-center"> Institute E </p>
                    <h2 class="text-center offset-md-3" id="Module_underline"> </h2>
                </div>
                <div class="col-md-3">
                    <h6 class="text-center"> Module II </h6>
                    <p class="text-center"> Institute E </p>
                    <h2 class="text-center offset-md-3" id="Module_underline"> </h2>
                </div>
                <div class="col-md-3">
                    <h6 class="text-center"> Module II </h6>
                    <p class="text-center"> Institute E </p>
                    <h2 class="text-center offset-md-3" id="Module_underline"> </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-css')
    <link rel="stylesheet" href="build/css/intlTelInput.css">
@endsection
@section('page-scripts')
<script>
    $(document).ready(function(){
        $("#signupform").hide();
        $("#btn_signup").click(function(){
            $("#signupform").show();
            $("#loginform").hide();
        });
        $("#btn_login").click(function(){
            $("#loginform").show();
            $("#signupform").hide();
        });

    });

</script>
@endsection
