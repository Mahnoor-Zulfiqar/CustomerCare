@extends('layouts.master')
@section('title','Add Dispositions Details')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                            Disposition Details

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
                            @if(empty($disposition))
                                <form name="disposition-detail" id="disposition-detail" method = "GET" action="{{route('add-disposition-detail')}}">
                            @else
                                <form name="disposition-detail" id="disposition-detail" method = "GET" action="{{route('update-disposition-detail')}}">
                            @endif
                            @csrf
                                <div class="disposition-class">
                                    <div class="disposition" style="display:flex;">
                                        <input type="text" class="form-control @error('disposition_type') is-invalid @enderror" id="disposition_type_1" name="disposition_type[]" style="width:50%;" value="{{($disposition)? $disposition->DispositionQuery : ''}}">
                                        <input type="hidden" class="form-control" id="detail_id" name="detail_id" style="width:50%;" value="{{($disposition)? $disposition->DispositionId : $detail_id }}">
                                        <input type="hidden" class="form-control" id="id" name="id" style="width:50%;" value="{{($disposition)? $disposition->id : '' }}">
                                        @if($update == false)
                                            <button name="add_more_types" id="add_more_types" data-id="1" class="btn btn-success ml-3 mt-0"> + Add More Type</button>
                                        @endif
                                    </div>
                                    @if($errors->has('disposition_type'))
                                        <div class="alert alert-danger">{{$errors->first('disposition_type')}}</div>
                                    @endif
                                    <div class="form-group">
                                    @if(empty($disposition))

                                    @else
                                        <div class="form-check">
                                            <input type="hidden" name="status" value="N">
                                            @php
                                            if(!empty($dispositions)){
                                                if($dispositions['status'] == 'Y'){
                                                    $check = 'checked';
                                                }else{
                                                    $check = '';
                                                }
                                            }else{
                                                $check = 'checked';
                                            }
                                            @endphp
                                            <input type="checkbox" class="form-check-input" value="Y" id="status" name="status" {{$check}}>
                                            <label class="form-check-label" for="exampleCheck2">Active</label>
                                        </div>
                                    @endif
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
<script type="text/javascript" src="jquery.js"></script>
<!-- <script type="text/javascript" src="jquery.validate.js"></script> -->\
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
     $(document).ready(function() {

        var i = 1;
        $('#add_more_types').click(function(e){
            e.preventDefault();
            i++;
            //console.log(' <input type="text" class="form-control" id="disposition_type_'+i+'" name="disposition_type">');
            $('.disposition-class').append('<div class="disposition" style="display: flex;"><input type="text" class="form-control mt-2" id="disposition_type_'+i+'" name="disposition_type[]" style="width:50%;"> <button name="remove_type" id="remove_type_'+i+'"  onclick="remove('+i+')" data-id="'+i+'" class="btn btn-danger ml-3 mt-1 remove_type">-Remove Type</button></div>');

        });
        //validate Form
        // $('#disposition-detail').validate({ // initialize the plugin
        //     rules: {
        //         "disposition_type[]":"required",
        //     }
        // });
    });
    function remove(id){
        $("#remove_type_"+id).parent('div').remove(); //Remove field html

    }
</script>
@endsection
