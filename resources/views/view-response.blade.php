
@extends('layouts.master')

@section('title','View CCD Response')

@section('content')

<div class="container-fluid">


        <form method="GET" action="{{route('view-ccd-response')}}" class="form-inline">

           <div class="form-group" style="margin-left:1%;">
           <div>
           <label class="from" style="justify-content:flex-start;">Call Type</label>
                <select class="chosen-select form-control" name="calltype" id="calltype">
                    <option value="0" {{ (app('request')->input('calltype') == 0)? 'selected': '' }}>Choose Call Type</option>
                    <option value="{{config('globalconstants.CallType.InBound')}}" {{ (app('request')->input('calltype') == config('globalconstants.CallType.InBound'))? 'selected': '' }}> InBound</option>
                    <option value="{{config('globalconstants.CallType.OutBound')}}" {{ (app('request')->input('calltype') == config('globalconstants.CallType.OutBound'))? 'selected': '' }}> OutBound</option>
                </select>
                </div>
            </div>
            <div class=" form-group" style="margin-left:1%;" >
            <div>
                <label class="employee" style="justify-content:flex-start;">Employee</label>
                <select class="chosen-select" name="employee" id="employee">
                    <option value="0" {{ (app('request')->input('employee') == 0)? 'selected': '' }} >Choose Employee</option>
                    @foreach($employees as $employe)
                        <option value="{{$employe->AttMachineNo}}" {{ (app('request')->input('employee') == $employe->AttMachineNo)? 'selected': '' }} >{{$employe->FullName}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group" style="margin-left:1%;">
            <div>
                <label class="from" style="justify-content:flex-start;">From</label>
                <input type="date" name="from" id="from" class="form-control" value="{{ (app('request')->input('from'))}}"/>
            </div>
            </div>
            <div class="form-group" style="margin-left:1%;">
               <div>
                <label class="to" style="justify-content:flex-start;">To</label>
                <input type="date" name="to" id="to" class="form-control"  value="{{ (app('request')->input('to'))}}"/>
               </div>
            </div>
            <button class="btn btn-primary mt-3 ml-1" type="submit"><i class="fas fa-search"></i></button>

        </form>
    </div>
    <div class="row mt-2">

        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Responses</h3>
                </div>
                <!-- <div class="d-inline-flex p-2 justify-content-end" width="100%">
                    <button class="btn btn-secondary mt-1 float-right mr-3 btn-sm"><a href="{{url('/export')}}" class="text-white text-decoration-none">Export to Excel</a></button>
                    <button class="btn btn-dark mt-1 float-right mr-3 btn-sm"><a href="/pdf" class="text-white text-decoration-none">Export to PDF</a></button>
                </div> -->


            <!-- </div> -->
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
                    <table id="example" class="table table-bordered table-hover" style="overflow-x:auto;display:block;">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Employee Id</th>
                                <th>Call Type Id</th>
                                <th>Disposition</th>
                                <th>Disposition Detail Id</th>
                                <th>Client Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Comment</th>
                                <th>Property</th>
                                <!-- <th>Future Investment</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($responses as $response)
                                <tr>
                                    <td>{{$response->id}}</td>
                                    <td>{{$response->EmployeeId}}</td>
                                    <td>{{$response->CallTypeId}}</td>
                                    @if(!empty($response->getDisposition))
                                        <td>{{$response->getDisposition->Name}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($response->getDispositionDetail))
                                        <td>{{$response->getDispositionDetail->DispositionQuery}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{$response->ClientName}}</td>
                                    <td>{{$response->ContactNumber}}</td>
                                    <td>{{$response->Address}}</td>
                                    <td>{{$response->Comment}}</td>
                                    <td>{{$response->Property}}</td>

                                    <td>
                                        <a href="{{url('/ccd-responses')}}/{{$response->id}}/edit" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/ccd-responses')}}/{{$response->id}}/delete" title="Delete"><i class="fas fa-trash"></i></a>
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
@section('scripts')

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
$(".chosen-select").chosen({width: "200px"});
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            //'copyHtml5',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
        ]
    } );
} );
</script>

@endsection
