<style>.my_error{color:red;}</style>
@extends('layouts.master')
@section('title','ADD Response')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                            Responses

                    </h3>
                    <!-- <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li role="tab" class="nav-item">
                                <a  class="nav-link" href=""  data-id="1">Inbound</a>
                            </li>
                            <li role="tab" class="nav-item">
                                <a  class="nav-link" href="" data-id="2">Outbound</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                            <!-- <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas> -->
                            @if(empty($response))
                                <form name="response-form" id="response-form" method = "GET" action="{{route('create-response')}}">
                            @else
                                <form name="response-form" id="response-form" method = "GET" action="{{route('update-response')}}">
                            @endif
                            @csrf

                                <div class="disposition-class">
                                    <input type="hidden" name="id" id="id" value="{{($response)? $response->id:''}}">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                        <label for="calltypeid">Select Call Type</label>
                                        <select class="chosen-select form-control @error('calltypeid') is-invalid @enderror" name="calltypeid" id="calltypeid" onchange="getdispositions(this.value);">
                                            <option value="">Select Call Type</option>
                                            <option value="{{config('globalconstants.CallType.InBound')}}"{{($response && $response->CallTypeId==config('globalconstants.CallType.InBound'))? 'selected' : ''}}>InBound</option>
                                            <option value="{{config('globalconstants.CallType.OutBound')}}" {{($response && $response->CallTypeId==config('globalconstants.CallType.OutBound'))? 'selected' : ''}}>OutBound</option>
                                        </select>

                                    @if($errors->has('calltypeid'))
                                            <div class="alert alert-danger">{{$errors->calltypeid}}</div>
                                         @endif
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="dispositionid">Select Disposition</label>
                                        <select class="chosen-select  form-control @error('dispositionid') is-invalid @enderror" name="dispositionid" id="dispositionid" onchange="getdispositiondetails(this.value);">
                                            <option value="">Select Disposition Type</option>
                                            @if($response)
                                                <option value="{{$response->getDisposition['id']}}" selected>{{$response->getDisposition['Name']}}</option>
                                            @endif
                                        </select>
                                        @if($errors->has('dispositionid'))
                                            <div class="alert alert-danger">{{$errors->dispositionid}}</div>
                                         @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                        <label for="dispositiondetailid">Select Disposition Query</label>
                                        <select class="chosen-select  form-control" name="dispositiondetailid" id="dispositiondetailid">
                                            <option value="">Select Disposition Query</option>
                                            @if($response)
                                                <option value="{{$response->getDispositionDetail['id']}}" selected>{{$response->getDispositionDetail['DispositionQuery']}}</option>
                                            @endif
                                        </select>
                                        @if($errors->has('dispositiondetailid'))
                                            <div class="alert alert-danger">{{$errors->dispositiondetailid}}</div>
                                         @endif
                                        </div>

                                        <div class="col-sm-6">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" value="{{($response)? $response->ClientName : ''}}">
                                        @if($errors->has('client_name'))
                                            <div class="alert alert-danger">{{$errors->client_name}}</div>
                                        @endif
                                       </div>

                                   </div>
                                   <div class="form-group row">
                                       <div class="col-sm-6">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact"  value="{{($response)? $response->ContactNumber : ''}}">
                                        @if($errors->has('contact'))
                                            <div class="alert alert-danger">{{$errors->contact}}</div>
                                        @endif
                                       </div>
                                       <div class="col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{($response)? $response->Address : ''}}">
                                        @if($errors->has('address'))
                                            <div class="alert alert-danger">{{$errors->address}}</div>
                                        @endif
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="property">Property</label>
                                            <input type="text" class="form-control @error('property') is-invalid @enderror" name="property" id="property" value="{{($response)? $response->Property : ''}}">
                                            @if($errors->has('property'))
                                                <div class="alert alert-danger">{{$errors->property}}</div>
                                            @endif
                                       </div>
                                       <div class="col-sm-6">
                                            <label for="comment">Comment</label>
                                                <textarea class="form-control @error('Comment') is-invalid @enderror" name="Comment" id="Comment">{{$response ? $response->Comment: ' '}}</textarea>
                                            @if($errors->has('Comment'))
                                                <div class="alert alert-danger">{{$errors->Comment}}</div>
                                            @endif
                                        <div>
                                    </div>
                                       </div>
                                    @php
                                        if($response)
                                            if($response->FutureInvestment == 'Y')
                                                $check = 'checked';
                                            else
                                                $check = '';
                                        else
                                            $check = '';
                                    @endphp
                                    <div class="form-group row">
                                        <div class="form-check ml-2">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="investment" value="N">
                                                    <input type="checkbox" class="form-check-input" value="Y" id="investment" name="investment" {{$check
                                                    }}>
                                                    <label class="form-check-label" for="exampleCheck2">Future Investment</label>
                                                </div>
                                                <div class="col-sm-6"></div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
{{-- <script type="text/javascript" src="jquery.js"></script> --}}
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(".chosen-select").chosen({width: "200px"});
     $(document).ready(function() {

        //validate Form
        $('#response-form').validate({ // initialize the plugin
            errorClass: "my_error",
            rules: {
                calltypeid:"required",
                dispositionid:"required",
                "Comment": {
                    required:true,
                    minlength:8
                },
                client_name:"required",
                contact:"required",
                address:"required",
                property:"required",
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass); //prevent class to be added to selects
            },
            // showErrors: function(errorMap, errorList) {
            //     if (errorList.length) {
            //         this.errorList = [errorList[0]];
            //     }
            //     this.defaultShowErrors();
            // }
        });
    });
    function getdispositions(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Empty the dropdown
        $('#dispositionid').find('option').not(':first').remove();
        $.ajax({
           url:"{{url('/get-dispositions')}}",
           method: "post",
           dataType:'json',
           data:{CallTypeId:id,"_token": "{{ csrf_token() }}"},
           success: function(response){
               //console.log(response);
                for (var i = 0; i<response.length; i++) {
                    var id = response[i].id;
                    var name = response[i].Name;
                    var option = "<option value='"+id+"'>"+name+"</option>";
                    $("#dispositionid").append(option);
                }
            }
       });

    }
    function getdispositiondetails(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Empty the dropdown
        $('#dispositiondetailid').find('option').not(':first').remove();
        $.ajax({
           url:"{{url('/get-disposition-detail')}}",
           method: "post",
           dataType:'json',
           data:{DispositionId:id,"_token": "{{ csrf_token() }}"},
           success: function(response){
                for (var i = 0; i<response.length; i++) {
                    var id = response[i].id;
                    var name = response[i].DispositionQuery;
                    var option = "<option value='"+id+"'>"+name+"</option>";
                    $("#dispositiondetailid").append(option);
                }
            }
       });

    }
</script>
@endsection
