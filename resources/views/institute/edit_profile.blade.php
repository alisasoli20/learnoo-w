@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <form id="institute_signupform" class="p-0 m-0" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-7 offset-md-5">
                            <img src="{{ asset('images/'.$user->id_photo) }}" class="img-fluid" height="200px" width="200px" style="border-radius: 50%;" id="blah">
                            <div class="col-md-10 offset-md-1 mr-5 mt-2">
                                <input name="id_photo" type="file" class="btn btn-sm" style="background-color:#3672D9;color:white;border-radius: 8px;" id="imgInp">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label for="Name of the institue" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Name of the institue* </label>
                        <div class="col-md-7">
                            <input type="text" name="institute_name"  class="form-control" id="setting_institute_name" placeholder="Name" value="{{ $user->institute_name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Teacher's Name* </label>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" id="setting_teacher_name" placeholder="Teacher's Name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Teacher's ID* </label>
                        <div class="col-md-7">
                            <input type="text" name="teacher_id" class="form-control" id="setting_email_id" placeholder="Teacher's Id" value="{!! $user->teacher_id !!}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Email* </label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control" id="setting_institute_Email" placeholder="Email" value="{!! $user->email !!}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Country* </label>
                        <div class="col-md-7">
                            <div class="form-group">
                                <select name="country" class="form-control" id="sel1" placeholder = "Select a Country" required>
                                    <option selected disabled>Select Country</option>
                                    @foreach(Countries::getList('en','php') as $country)
                                        <option value="{{ $country }}"  {{ ($country === $user->country)? "selected" : ''  }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Telephone No* </label>
                        <div class="col-md-7">
                            <input type="tel" name="phone" class="form-control" id="setting_Telephone_no" placeholder="Telephone No" value="{!! $user->phone !!}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Question* </label>
                        <div class="col-md-7">
                            <div class="form-group">
                                <select name="security_question" class="form-control" id="sel1" placeholder = "Select a Security Question" required>
                                    @php
                                        $security_questions = \App\Models\SecurityQuestion::all();
                                    @endphp
                                    @foreach($security_questions as $securityQuestion)
                                        <option value="{{ $securityQuestion->id }}" {{ ($securityQuestion->id == $user->security_question)?"selected":'' }}>{{ $securityQuestion->question }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Security Answer* </label>
                        <div class="col-md-7">
                            <input type="text" name="security_answer" class="form-control" id="Security_answer" placeholder="Security Answer" value="{{ $user->security_answer }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;"> New Password* </label>
                        <div class="col-md-7">
                            <input type="password" name="password" class="form-control" id="setting_institute_Password" placeholder="New Password">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Retype Password* </label>
                        <div class="col-md-7">
                            <input type="password" name="password_confirmation" class="form-control" id="setting_institute_Retype-Password" placeholder="Retype-Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7 offset-md-7">
                            <a href="{{ route('institute.profile') }}" id="btn_cancel" class="btn btn-default" style="border:1px solid  rgba(121, 121, 121, 1);background-color: rgba(255, 255, 255, 1);margin-right:20px;" > Cancel</a>
                            <button type="submit" id="btn_signup" class="btn" style="background-color: #3672D9;color:white;">Save Changes</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection

@section('page-scripts')
    <script>
        $("#imgInp").change(function() {
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    </script>
@endsection
