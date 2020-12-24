@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="row" >
                    <div class="col-md-2" id="search" >
                        <div class="checkbox">
                            <label><input type="checkbox" value=""> Government Institute</label>
                        </div>
                    </div>
                    <div class="col-md-2" id="search" >
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Private Institute</label>
                        </div>
                    </div>
                    <div class="col-md-1" id="search" >
                        <div class="checkbox">
                            <label><input type="checkbox" value=""> Part Time</label>
                        </div>
                    </div>
                    <div class="col-md-1" id="search" >
                        <div class="checkbox">
                            <label><input type="checkbox" value=""> Full Time</label>
                        </div>
                    </div>
                    <div class="col-md-2" id="searchbar" >
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <label for="refno">Ref No:</label>
                                <input type="text" class="form-control col-md-7 ml-1" id="refno" style="height:30px;">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"  id="searchbar" >
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <label for="Keyword">Keyword:</label>
                                <input type="text" class="form-control col-md-6 ml-1" id="Keyword" style="height:30px;">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1 " >
                        <button type="submit" class="btn btn-sm btn-block mt-2" style="font-size: 12px;background-color: #FD0585;color:white;"> Search </button>
                    </div>
                    <div class="col-md-1 m-0 p-0 justify-content-start" >
                        <button type="submit" class="btn btn-sm mt-2" style="font-size: 12px;background-color: #3672D9; color:white;"> View All Subjects </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 ml-2 ">
                <div class="row">
                    @foreach($subjects as $subject)
                    <div class="col-md-2">
                        <p class="text-center">{{ $subject->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 ">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Ref No</th>
                        <th scope="col">Module</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Click To Open PDF</th>
                        <th scope="col">Click To Apply</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->id }}</td>
                            <td>{{ $module->name }}</td>
                            <td>{{ $module->institute_name }}</td>
                            <td>{{ $module->start_date }}</td>
                            <td>{{ $module->end_date }}</td>
                            <td><a target="_blank" href="{{ asset("pdfs/".$module->pdf) }}" class="btn btn-secondary">Full View</a></td>
                            <td><form method="POST" action="{{ route('student.module.apply',$module->id) }}">@csrf<button type="submit" class="btn btn-primary">Apply</button></form></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
