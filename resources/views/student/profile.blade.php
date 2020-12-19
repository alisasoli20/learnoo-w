@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-2 mt-5">
                <img src="{{ asset("public/images/".Auth::user()->id_photo) }}" class="img-fluid ml-3" height="300px" width="200px" style="border-radius: 50%;">
            </div>
            <div class="col-md-5 mt-5 ml-4">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <p style="font-size: 20px;"> Student Name: <p>
                    </div>
                    <div class="col-md-5 ">
                        <p style="font-size:18px;margin-top:2px;" class="ml-5"> Ahmed Memon <p>
                        <p id="contactus_underline"> </p>
                    </div>
                    <div class="col-md-3">
                        <a href="" type="submit" class="btn btn-sm" style="background-color:#3672D9;color:white"> Edit profile </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <p style="font-size: 20px;"> Student ID: <p>
                    </div>
                    <div class="col-md-8 ">
                        <p style="font-size:18px;margin-top:2px;" class="ml-5"> A15-03125 <p>
                        <p id="contactus_underline"> </p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <p style="font-size: 20px;"> Uploaded ID: <p>
                    </div>
                    <div class="col-md-8 ">
                        <a href="" type="submit" class="btn btn-block col-md-7" style="background-color:#3672D9;color:white"> View Download </a>
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
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
