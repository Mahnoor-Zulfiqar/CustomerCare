@extends('layouts.master')

@section('title','Report')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Report</h3>
                </div>
                <div class="card-body">

                    <div class="tab-content p-0">

                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <form method = "GET" id="report-form" name="report-form" action="{{route('filter-report')}}">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="disposition">From:</label>
                                        <input type="date" class="form-control" id="from" name="from" value="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="disposition">To:</label>
                                        <input type="date" class="form-control" id="to" name="to" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="employeeid">Select Employee</label>
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $emp)
                                                <option value="{{$emp->ID}}">{{$emp->FullName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-3 ml-1" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
