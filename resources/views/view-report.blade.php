<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
    <style>
        .container{
            margin: auto;
            width: 950px;
            min-height: 50px;
            border: #666 thin ridge;
            line-height: 17px;
        }
        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color:#9097a9;
            color: white;
        }
        /* .table tr:nth-child(even){background-color: #f2f2f2;} */
        .table tr {background-color: #ddd;}
        .table td, .table th {
            border: 1px solid #f5e9e9;
            padding: 8px;
            overflow: hidden;
        }
        .table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }
        .table-div{padding: 1%;}
        .card-body{ border:1px solid #CCC;}

    </style>
</head>
    <body>
<div class="container-fluid" style="margin: auto;width:60%;">


    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="width:949px;">
                    <div style="height:40px; margin-bottom:5px;">
                        <div style="width:946px; height:25px; text-align:center; font-size:21px; padding-left:2px; border: solid 1px #333; background-color:#CCC;">AAA Associates</div>
                        <div style="width:946px; height:25px; text-align:center; font-size:11px;padding-left:2px;border: solid 1px #333; background-color:#CCC;">Main Office Business Center</div>
                    </div>
                    <div class="table-div">
                        <table id="example" class="table table-bordered table-hover" style="margin-left: auto;width: 80%;border: 1px solid;margin-top: 5%;">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Employee Id</th>
                                    <th>Call Type Id</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $value)
                                    <tr style="background-color: #ddd;">
                                        @if($value->CallTypeId == 125)
                                            <td>InBound</td>
                                        @else
                                            <td>OutBound</td>
                                        @endif
                                        <td>{{$value->total_calls}}</td>
                                        <td>{{$value->valued_calls}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 2, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            //'copyHtml5',
            {
                extend: 'excelHtml5',
            },

            {
                extend: 'pdfHtml5',
            },
        ]
    } );
} );
</script>

