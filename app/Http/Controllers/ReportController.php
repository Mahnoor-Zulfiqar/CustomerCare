<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Redirect;
use App\Models\CCDResponse;
use DB;
class ReportController extends Controller
{
    //
    public function index(){
        $ccd_id = Config::get('globalconstants.CallType.CCDID');
        $employees = DB::table('employees')->select('ID','FullName')->where(['DepartmentID'=>$ccd_id])->get();
        return view('report',compact('employees'));
    }
    public function showdata(Request $request){
        $data = DB::select("SELECT CallTypeId ,count(*) as total_calls,(case When FutureInvestment ='Y' then count(*) ELSE 0 END) as valued_calls from c_c_d_responses WHERE `EmployeeId` = '$request->employee_id' AND `created_at` BETWEEN '$request->from' AND '$request->to' group by CallTypeId");
        return view('view-report',compact('data'));
    }

}
