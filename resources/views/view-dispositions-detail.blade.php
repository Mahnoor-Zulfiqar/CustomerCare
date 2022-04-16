@extends('layouts.master')
@section('title','View Dispositions')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dispositions</h3>
                </div>
                @if (Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif
                @if(Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{Session::get('error') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Inbound/Outbound Id</th>
                                <th>Disposition </th>
                                <th>Disposition Query</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getDispositionDetail as $DispositionDetail)
                                <tr>
                                    <td>{{$DispositionDetail->id}}</td>
                                    @if($DispositionDetail->CallTypeId == 125)
                                        <td>InBound</td>
                                    @else
                                        <td>OutBound</td>
                                    @endif
                                    <td>{{$DispositionDetail->getDisposition->Name}}</td>
                                    <td>{{$DispositionDetail->DispositionQuery}}</td>
                                    <td>
                                        <a href="{{url('/disposition-detail')}}/{{$DispositionDetail->id}}/edit" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/disposition-detail-delete')}}/{{$DispositionDetail->id}}" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <!-- <tfoot>
                    <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                    </tr>
                    </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
