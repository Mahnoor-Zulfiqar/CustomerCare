<?php
/*  Author : Mahnoor Zulfiqar
    Date : 3-14-2022
*/
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Redirect;
use App\Models\Disposition;
use App\Models\DispositionDetail;
use App\Models\CCDResponse;
use DB;
use DateTime;
use DatePeriod;
use DateInterval;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request){

        // if(Session::has('userId')){

            $user_data = DB::table('user')->where(['EmpID'=>$request->id])->get();
            $employee = DB::table('employees')->where(['ID'=>$request->id])->get();
            foreach($user_data as $user){
                session()->put('role', $user->SetRole);
                $branchID = $user->BranchID;
                session()->put('branchId', $user->BranchID);
            }
            foreach($employee as $emp){
                session()->put('Name', $emp->FullName);
                session()->put('userId', $emp->AttMachineNo);
            }

            $period =[]; $dataset=[]; $i = 0; $callrecord = [];
            $investments_details = [];
            $InBoundCallTypeID = Config::get('globalconstants.CallType.OutBound');
            $first_day_this_month = date('M-01-Y'); // hard-coded '01' for first day
            $last_day_this_month  = date('M-t-Y');
            $period = new DatePeriod( new DateTime($first_day_this_month), new DateInterval('P1D'), new DateTime($last_day_this_month));
            $from = date('m-01-Y'); // hard-coded '01' for first day
            $to  = date('m-t-Y');

            foreach($period as $date){
            $ranges[] = $date->format("Y-m-d");
            }
            foreach($ranges as $range){
                $dataset[$range]['callTypeId'] = Config::get('globalconstants.CallType.OutBound');
                $dataset[$range]['responses'] = 0;
                $dataset[$range]['date'] = $range;
                $investments_details[$range]['date'] = $range;
                $investments_details[$range]['investment'] = 0;
            }
            $investment_responses = DB::table('c_c_d_responses')
            ->select(DB::raw('DATE(created_at) as date'),DB::raw('CallTypeId') ,DB::raw('count(*) as investment'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where(['FutureInvestment'=>'Y'])
            ->where(['BranchId'=>$branchID])
            ->groupBy('date','CallTypeId')
            ->get()->toArray();

            $responses = DB::table('c_c_d_responses')
            ->select(DB::raw('DATE(created_at) as date'),DB::raw('CallTypeId') ,DB::raw('count(*) as responses'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('CallTypeId', $InBoundCallTypeID)
            ->where(['BranchId'=>$branchID])
            ->groupBy('date','CallTypeId')
            ->get()->toArray();
            $count = count($responses);
            $i = 0;
            if($count > 0){
                foreach($responses as $response){
                        //foreach($ranges as $range){
                        $i++;
                        $date = $response->date;
                        if(in_array($response->date, $ranges)){

                            $dataset[$response->date]['callTypeId'] = $response->CallTypeId;
                            $dataset[$response->date]['responses'] = $response->responses;
                            $dataset[$response->date]['date'] = $response->date;
                            ;
                        }

                }
            }
            $investment_count = count($investment_responses);
            if($investment_count > 0){
                foreach($investment_responses as $investments){
                    if(in_array($investments->date, $ranges)){

                        $investments_details[$investments->date]['date'] = $investments->date;
                        $investments_details[$investments->date]['investment'] = $investments->investment;
                    }
                }
            }

            $inboundcalls = CCDResponse::select(DB::raw('count(*) as InBoundResponses'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where(['CallTypeId'=>Config::get('globalconstants.CallType.InBound')])
            ->where(['BranchId'=>$branchID])
            ->first();

            $outboundcalls = CCDResponse::select(DB::raw('count(*) as OutBoundResponses'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where(['CallTypeId'=>Config::get('globalconstants.CallType.OutBound')])
            ->where(['BranchId'=>$branchID])
            ->first();

            $totalcalls = CCDResponse::select(DB::raw('count(*) as TotalResponses'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where(['BranchId'=>$branchID])
            ->first();

            $active_dialers = CCDResponse::where(['BranchId'=>$branchID])->whereMonth('created_at', Carbon::now()->month)->count(DB::raw('DISTINCT EmployeeId'));
            $valued_calls = CCDResponse::where(['BranchId'=>$branchID])->where(['FutureInvestment'=>'Y'])->whereMonth('created_at', Carbon::now()->month)->count(DB::raw('Id'));
            $dialers = DB::table('employees as emp')
                        ->select('emp.ID')
                        ->join('user as u','emp.ID','=','u.EmpID')
                        ->where(['emp.DepartmentID'=>Config::get('globalconstants.CallType.CCDID')])
                        ->where(['u.SetRole'=>'Employee'])
                        ->get();
            $total_dialers = count($dialers);
            $callrecord = array('inboundcalls'=>$inboundcalls->InBoundResponses,'outboundcalls'=>$outboundcalls->OutBoundResponses,'totalcalls'=>$totalcalls->TotalResponses);
            return view('home',compact('dataset','callrecord','active_dialers','valued_calls','total_dialers','investments_details'));
        // }else{
        //     return redirect()->away('http://aaacrm.net/');
        // }
    }
    public function performLogout(Request $request){
        //dd('test');
        // Session::flush();
        // if($request->action){
            return view('welcome');
        //return redirect()->away('http://aaacrm.net/aaacms/web/site/logouts');
        // }else{
        //     return redirect('/logout');
        // }
    }
    // public function Logout(Request $request){
    //     return redirect()->away('http://aaacrm.net/');
    // }
}

