@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
            <div class="col-md-2 mt-5">
                <img src="{{ asset("images/".Auth::user()->id_photo) }}" class="img-fluid ml-3" height="300px" width="200px" style="border-radius: 50%;">
            </div>
            <div class="col-md-5 mt-5 ml-4">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <p style="font-size: 20px;"> Student Name: <p>
                    </div>
                    <div class="col-md-5 ">
                        <p style="font-size:18px;margin-top:2px;" class="ml-5">{{ Auth::user()->name }} <p>
                        <p id="contactus_underline"> </p>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route("student.profile.edit") }}" type="submit" class="btn btn-sm" style="background-color:#3672D9;color:white"> Edit profile </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <p style="font-size: 20px;"> Student ID: <p>
                    </div>
                    <div class="col-md-8 ">
                        <p style="font-size:18px;margin-top:2px;" class="ml-5"> {{ Auth::user()->student_id }} <p>
                        <p id="contactus_underline"> </p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <p style="font-size: 20px;"> Uploaded ID: <p>
                    </div>
                    <div class="col-md-8 ">
                        <a href="{{ asset('images/'.Auth::user()->id_photo) }}" target="_blank" type="submit" class="btn btn-block col-md-7" style="background-color:#3672D9;color:white"> View Download </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ref No</th>
                        <th scope="col">Module</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Click To Open PDF</th>
                        <th scope="col">Status of the online Class</th>
                        <th scope="col">Direct Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applied_modules as $applied_module)
                    <tr>
                        <td>{!! $applied_module->id !!}</td>
                        <td>{!! $applied_module->module->name !!}</td>
                        <td>{!! $applied_module->module->institute_name !!}</td>
                        <td>{!! $applied_module->module->start_date !!}</td>
                        <td>{!! $applied_module->module->end_date !!}</td>
                        <td><a href="{!! asset('pdfs/'.$applied_module->module->pdf) !!}" target="_blank" class="btn btn-success">Open PDF</a></td>
                        <td>{!! $applied_module->status !!}</td>
                        <td><a href="#">Add Message</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
