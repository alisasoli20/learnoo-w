@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-5">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center"> Login on behalf your Institute </h3>
                    </div>
                    <div class="col-md-12">
                        <form id=institute_loginform method="POST" action="{{ route("institute.login") }}">
                            @csrf
                            <div class="form-group row mt-4">
                                <label for="" class="col-md-2 offset-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Email* </label>
                                <div class="col-md-7">
                                    <input type="text"  name="email" class="form-control" id="" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-md-2 offset-md-3 col-form-label" style="font-family: sans-serif;font-weight: bold;">Password* </label>
                                <div class="col-md-7" >
                                    <input type="password" name="password" class="form-control" id="institute_inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-7 offset-md-5">
                                    <a href="" style="color:#2765CF;"> <p class="d-flex justify-content-end"> Forget Password? </p> </a>
                                    <button type="submit"  class="btn btn-block" style="background-color: #FD0585;color:white;">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex justify-content-center">
                <div id="sidebar">

                </div>
            </div>
            <div class="col-md-6">
                <div class="row" >
                    <div class="col-md-12">
                        <h3 class=""> Register Your Institute </h3>
                    </div>
                    <div class="col-md-12">
                        <form id="institute_signupform" class="p-0 m-0" method="POST" action="{{ route('institute.register') }}">
                            @csrf
                            <div class="form-group row mt-4">
                                <label for="Name of the institue" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Name of the institue* </label>
                                <div class="col-md-7">
                                    <input type="text" name="institute_name"  class="form-control" id="" placeholder="Name">
                                    @error('institute_name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Teacher's Name* </label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control"  id="teacher_name" placeholder="Teacher's Name">
                                    @error('name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Teacher's ID* </label>
                                <div class="col-md-7">
                                    <input type="text" name="teacher_id" class="form-control" id="_id" placeholder="Teacher's Id">
                                    @error('teacher_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Email* </label>
                                <div class="col-md-7">
                                    <input type="email" name="email" class="form-control" id="institute_Email" placeholder="Email">
                                    @error('email')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Country* </label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <select class="form-control" name="country" id="sel1" placeholder = "">
                                            <option selected disabled>Select a Country</option>
                                            @foreach(Countries::getList('en','php') as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Telephone No* </label>
                                <div class="col-md-7">
                                    <input type="tel" class="form-control" id="Telephone_no" name="phone" placeholder="Telephone No">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Question* </label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <select class="form-control" name="security_question" id="institute_Security_qustion" placeholder = "Select a Security Question">
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
                                        @error('security_question')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Answer* </label>
                                <div class="col-md-7">
                                    <input type="text" name="security_answer" class="form-control" id="institute_Security_answer" placeholder="Security Answer">
                                    @error('security_answer')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;"> Password* </label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" id="institute_Password" placeholder="Password">
                                    @error('password')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Retype Password* </label>
                                <div class="col-md-7">
                                    <input type="password" name="password_confirmation" class="form-control" id="institute_Retype-Password" placeholder="Retype-Password">
                                    @error('password_confirmation')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="checkbox">
                                <label style="font-size: 13px;"><input type="checkbox" class="mr-2" name="" value="" style="height:13px;" required>I read Terms and Conditions, Privacy Policy, Security Policy and agree with all.</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" id="institute_btn_signup" class="btn btn-block" style="background-color:#3672D9;color:white;">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection
