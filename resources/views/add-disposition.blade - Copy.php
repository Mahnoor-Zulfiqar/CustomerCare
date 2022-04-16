@extends('layouts.master')
@section('title','ADD Dispositions')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($dispositions as $disposition)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                                Dispositions

                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">

                                @if($disposition->CallTypeId == config('globalconstants.CallType.InBound'))
                                    <li role="tab" class="nav-item">
                                        <a  class="nav-link {{$disposition->CallType == config('globalconstants.CallType.InBound') ? 'active' : ''}}" href="{{url('add-disposition/'.config('globalconstants.CallType.InBound'))}}"  data-id="1">Inbound</a>
                                    </li>
                                @else
                                    <li role="tab" class="nav-item">
                                        <a  class="nav-link {{$disposition->CallTypeId == config('globalconstants.CallType.OutBound') ? 'active' : '' }}" href="{{url('add-disposition/'.config('globalconstants.CallType.OutBound'))}}" data-id="2">Outbound</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                @if(!$dispositions->isEmpty())
                                    <form method = "GET" action="{{url('update-disposition')}}">
                                @else
                                    <form method = "GET" action="{{url('create-disposition')}}">
                                @endif
                                <input type="hidden" class="form-control" id="call_type_id" name="call_type_id" value="{{$id}}">

                                    @csrf
                                        <div class="form-group">
                                            <label for="disposition">Disposition Name:</label>
                                            <input type="text" class="form-control" id="disposition" name="disposition" value="{{$disposition->Name}}">

                                        </div>
                                        @if($errors->has('disposition'))
                                            <div class="alert alert-danger">{{$errors->first('disposition')}}</div>
                                        @endif
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
