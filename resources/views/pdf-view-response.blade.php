
<div class="container-fluid">
    <div class="row">
  
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responses</h3>
                </div>
                <div class="card-body">
                    <table style="font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;border 2px solid gray;">
                        <thead style="padding-top: 12px;padding-bottom: 12px;text-align:center;background-color:#808080;color: white;font-size:12px;">
                            <tr>
                                <th>Sr#</th>
                                <th>Employee Id</th>
                                <th>Call Type Id</th>
                                <th>Disposition Id</th>
                                <th>Disposition Detail Id</th>
                                <th>Client Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Comment</th>
                                <th>Property</th>
                                <th>Future Investment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($responses as $response)
                                <tr style="background-color: #f2f2f2;text-align:center;">
                                    <td>{{$response->id}}</td>
                                    <td>{{$response->EmployeeId}}</td>
                                    <td>{{$response->CallTypeId}}</td>
                                    <td>{{$response->DispositionId}}</td>
                                    <td>{{$response->DispositionDetailId}}</td>
                                    <td>{{$response->ClientName}}</td>
                                    <td>{{$response->ContactNumber}}</td>
                                    <td>{{$response->Address}}</td>
                                    <td>{{$response->Comment}}</td>
                                    <td>{{$response->Property}}</td>
                                    <td>{{$response->FutureInvestment}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
