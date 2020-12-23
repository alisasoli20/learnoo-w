@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-2">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mt-5">
                <img src="{{ asset('images/'.Auth::user()->id_photo) }}" class="img-fluid ml-3" height="300px" width="200px" style="border-radius: 50%;">
            </div>
            <div class="col-md-8 mt-5 ml-4">
                <div class="row mt-5">
                    <div class="col-md-4 mt-4">
                        <p style="font-size: 15px;"> Institute Name: <p>
                    </div>
                    <div class="col-md-5 mt-4">
                        <p style="font-size:13px;margin-top:2px;" class=""><p>
                        <p id="contactus_underline">{{ Auth::user()->institute_name }}</p>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('institute.profile.edit') }}" type="submit" class="btn btn-sm" style="background-color:#3672D9;color:white"> Edit Details </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <p style="font-size: 15px;"> Teacher's Name: <p>
                    </div>
                    <div class="col-md-8 ">
                        <p style="font-size:13px;margin-top:2px;" class="ml-5">{{ Auth::user()->name }}<p>
                        <p id="contactus_underline"> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-10 offset-md-1 ">
            <h3 class="ml-4"> Insert New Module </h3>
        </div>
        <div class="col-md-10 offset-md-1">
            <form id="institute_profile_form" method="POST" action="{{ route('institute.module.insert') }}" class="ml-4" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mt-4">
                    <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Module Name* </label>
                    <div class="col-md-5">
                        <input type="text" name="name"  class="form-control" id="" placeholder="Module Name" required>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Subject* </label>
                    <div class="col-md-5">
                        <div class="form-group">
                            <select class="form-control" name="subject" id="Subject" placeholder = "" required>
                                <option selected="selected" disabled>Select the relevant Subject </option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;"> Start Date* </label>
                    <div class="col-md-5">
                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="" required>
                        @error('name')
                        <div class="start_date">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">End Date* </label>
                    <div class="col-md-5">
                        <input type="date" name="end_date" class="form-control" id="End_date" placeholder="" required>
                        @error('end_date')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label" style="font-family: sans-serif;font-weight: bold;">Upload PDF* </label>
                    <div class="col-md-5">
                        <input type="file" name="pdf" class="form-control" id="upload_pdf" placeholder="" required>
                        @error('pdf')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 offset-md-4">
                        <button type="submit" id="institute_btn_signup" class="btn btn-block" style="background-color:#3672D9;color:white;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid m-0 p-0">
        <div class="col-md-12 m-0 p-0">
            <table class="table table-striped table-responsive table-bordered table-hover ">
                <thead class="thead-dark">
                <tr>
                    <th id="table_head">Ref No</th>
                    <th id="table_head">Module</th>
                    <th id="table_head">Candidate's Name</th>
                    <th id="table_head">Candidate's Country
                        <select class="" class="col-md-2" id="Subject" placeholder = "">
                            <option selected="selected">ALL </option>
                            <option > Srilanka </option>
                            <option > Pakistan </option>
                        </select>
                    </th>
                    <th id="table_head">Candidate's Telephone Number</th>
                    <th id="table_head">Candidate's Email</th>
                    <th id="table_head">Start Date</th>
                    <th id="table_head">End Date</th>
                    <th id="table_head">Click To Open PDF</th>
                    <th id="table_head">Click to Start the online video class</th>
                    <th id="table_head">Status of the task </th>
                    <th id="table_head">Note </th>
                    <th id="table_head">Direct Message</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>+92-125478521</td>
                    <td>hello123456@gmail.com</td>
                    <td>12-05-2020</td>
                    <td>12-05-2020</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
