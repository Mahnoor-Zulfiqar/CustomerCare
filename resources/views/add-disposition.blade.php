@extends('layouts.master')
@section('title','ADD Dispositions')
@section('content')
<div class="container-fluid">
    <div class="row">
        @php
        if(!empty($dispositions)){
            foreach($dispositions as $disposition) {
                $name = $disposition['Name'] ;
                $id = $disposition['id'];
                $cid = $disposition['CallTypeId'];
                $active = $disposition['Active'];
            }
            $action ="update-disposition";
        }
        else{
            $cid = $id ;
            $id = '' ;
            $name = '';
            $active = 'Y';
            $action = "create-disposition";
        }
        @endphp
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                                Dispositions
                                
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li role="tab" class="nav-item">
                                    <a  class="nav-link {{$cid == config('globalconstants.CallType.InBound') ? 'active' : ''}}" href="{{url('add-disposition/'.config('globalconstants.CallType.InBound'))}}"  data-id="1">Inbound</a>
                                </li>
                                <li role="tab" class="nav-item">
                                    <a  class="nav-link {{$cid == config('globalconstants.CallType.OutBound') ? 'active' : '' }}" href="{{url('add-disposition/'.config('globalconstants.CallType.OutBound'))}}" data-id="2">Outbound</a>
                                </li>
                                
                            
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                <form method = "GET" name="disposition-form" id="disposition-form" action="{{url($action)}}">
                                @csrf
                                <input type="hidden" class="form-control" id="call_type_id" name="call_type_id" value="{{$cid}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}">
                                    
                                        <div class="form-group">
                                            <label for="disposition">Disposition Name:</label>
                                            <input type="text" class="form-control" id="disposition" name="disposition" value="{{$name}}">
                                            
                                        </div>
                                        @if($errors->has('disposition'))
                                            <div class="alert alert-danger">{{$errors->first('disposition')}}</div>
                                        @endif
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="hidden" name="status" value="N">
                                                <input type="checkbox" class="form-check-input" value="Y" id="status" name="status" {{($active == 'Y')? 'checked':''}}>
                                                <label class="form-check-label" for="exampleCheck2">Active</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //validate Form
        $('#disposition-form').validate({ // initialize the plugin
            rules: {
                disposition: {
                    required: true,
                }
            }
        });
    });
@endsection