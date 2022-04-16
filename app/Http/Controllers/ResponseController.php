<?php
/*  Author : Mahnoor Zulfiqar
    Date : 3-14-2022
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CCDResponse;
use App\Models\Disposition;
use App\Models\DispositionDetail;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResponseExport;
use Auth;
use PDF;
use DB;
use Session;
class ResponseController extends Controller
{
    //
    public function index(Request $request){

        $ccd_id = Config::get('globalconstants.CallType.CCDID');
        $employees = DB::table('employees')->select('AttMachineNo','FullName')->where(['DepartmentID'=>$ccd_id])->get();
        $DeleteStatusID = Config::get('globalconstants.CallType.NotDeletedStatusValue');

        if(count($request->all())>0){
            $from = $request->from.' 00:00:01';
            $to = $request->to.' 23:59:59';
            $responses = CCDResponse::where(['CallTypeId'=>$request->calltype])
            ->Where(['EmployeeId'=>$request->employee])
            ->WhereBetween('created_at',[$from,$to])
            ->get();
        }else{
            $responses = CCDResponse::with('getDisposition','getDispositionDetail')->where(['IsDeleted'=>'N'])->get();
        }
        //dd($responses);
        return view('view-response',compact('responses','employees'));
    }
    public function addResponse(Request $request){
        $response  = [];
        return view('add-response',compact('response'));
    }
    public function fetchDispositions(Request $request){
        $data = [];
        $dispositions = Disposition::where(['CallTypeId'=>$request->CallTypeId])->get();
        return $dispositions;
    }
    public function fetchDispositionDetail(Request $request){
        // dd($request->id);
        $dispositiondetail = DispositionDetail::where(['DispositionId'=>$request->DispositionId])->get();
        return $dispositiondetail;
    }
    public function storeResponse(Request $request){
        $activeby = Session::get('userId');
        $branchId = Session::get('branchId');
        // $validated = $request->validate([
        //     'calltypeid' => 'required',
        //     'dispositionid' => 'required',
        //    // 'dispositiondetailid' => 'required',
        //     'client_name' => 'required',
        //     'contact' => 'required',
        //     'address' => 'required',
        //     'Comment' => 'required|min:8',
        //     'property' => 'required',
        // ]);

        CCDResponse::create([
            'EmployeeId'=>$activeby,
            'CallTypeId'=>$request->calltypeid,
            'DispositionId'=>$request->dispositionid,
            'DispositionDetailId'=>$request->dispositiondetailid,
            'ClientName'=>$request->client_name,
            'ContactNumber'=>$request->contact,
            'BranchId'=>$branchId,
            'Address'=>$request->address,
            'Comment'=>$request->Comment,
            'Property'=>$request->property,
            'FutureInvestment'=> $request->investment,

        ]);
        return redirect('/view-ccd-response')->with('success','The Response Added successfuly!');
    }
    public function editResponse(Request $request){
        $response = CCDResponse::with('getDisposition','getDispositionDetail')->where(['id'=>$request->id])->firstOrFail();
        // dd($response);
        return view('add-response',compact('response'));
    }
    public function updateResponse(Request $request){
        $activeby = Session::get('userId');
        $branchId = Session::get('branchId');
        CCDResponse::where(['id'=>$request->id])->update([
            'EmployeeId'=>$activeby,
            'CallTypeId'=>$request->calltypeid,
            'DispositionId'=>$request->dispositionid,
            'DispositionDetailId'=>$request->dispositiondetailid,
            'ClientName'=>$request->client_name,
            'ContactNumber'=>$request->contact,
            'BranchId'=>$branchId,
            'Address'=>$request->address,
            'Comment'=>$request->Comment,
            'Property'=>$request->property,
            'FutureInvestment'=> $request->investment,
        ]);
        return redirect('/view-ccd-response')->with('success','The Response Updated successfuly!');
    }
    public function deleteResponse(Request $request){
        $DeleteStatusID = Config::get('globalconstants.CallType.DeletedStatusValue');
        $Deletedby = Session::get('userId');
        CCDResponse::where(['id'=>$request->id])->update(['IsDeleted'=>$DeleteStatusID,'DeletedBy'=>$Deletedby]);
        return redirect('/view-ccd-response')->with('success','The Disposition Deleted  successfuly!');
    }
    public function filters(Request $request,$data){

        $responses = CCDResponse::where(['CallTypeId'=>$data->calltype])
                    ->orwhere(['EmployeeId'=>$data->employee])
                    ->whereBetween('created_at',[$data->from,$data->to])
                    ->get();
        return view('view-response',compact('responses'));
    }
    // public function exportexcel(Request $request){
    //     return Excel::download(new ResponseExport, 'call-response.xlsx');
    // }
    // public function exportpdf(Request $request){

    //     $responses = CCDResponse::all();

    //     $pdf = PDF::loadView('pdf-view-response',compact('responses'))->setPaper('a4', 'landscape');;

    //    return $pdf->download('call-response.pdf');
    //    header("location: view-ccd-response.blade.php");
    // }
}
