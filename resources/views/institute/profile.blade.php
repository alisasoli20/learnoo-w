@extends('layouts.app')
@section('content')
    <div id="loading"></div>
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
            <table class="table table-striped table-responsive table-bordered table-hover text-center">
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
                @foreach($modules as $module)
                    @foreach($module->applied_modules as $applied_module)
                    <tr>
                        <td>{!! $applied_module->id !!}</td>
                        <td>{!! $module->name !!}</td>
                        <td>{!! $applied_module->student->name !!}</td>
                        <td>{!! $applied_module->student->country !!}</td>
                        <td>{!! $applied_module->student->phone !!}</td>
                        <td>{!! $applied_module->student->email !!}</td>
                        <td>{!! $module->start_date !!}</td>
                        <td>{!! $module->end_date !!}</td>
                        <td><a href="{!! asset('pdfs/'.$module->pdf) !!}" target="_blank" class="btn btn-success">Open</a></td>
                        <td><button id="create-meeting" class="btn btn-primary" onclick="startMeeting({{  $module->id }}, {{ $applied_module->student->id }})">Start</button></td>
                        <td>{!! $applied_module->status !!}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Notes</button></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Message</button></td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{-- Send Message Model--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text" class="form-control" readonly value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function (){
            setVisible("#loading",false)
        })
        function startMeeting($m,$student_id) {
            setVisible('#loading',true)
            var module_id = $m
            var student_id = $student_id
            $.ajax({
                type: 'GET',
                url: "{{ route('institute.meeting.create') }}",
                data: {  "module_id": module_id , "student_id": student_id},
                success: function (data){
                    setVisible('#loading',false)
                    var data = JSON.parse(data)
                    window.open(data, "_blank")
                }
            })
        }
        function setVisible(selector, visible) {
            document.querySelector(selector).style.display = visible ? 'block' : 'none';
        }
    </script>
@endsection
