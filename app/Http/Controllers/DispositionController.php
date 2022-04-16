<?php
/*  Author : Mahnoor Zulfiqar
    Date : 3-14-2022
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Redirect;
use App\Models\Disposition;
use App\Models\DispositionDetail;
use Auth;
use DB;
use Session;
class DispositionController extends Controller
{
    //
    public function index(Request $request){
        $DeleteStatusID = Config::get('globalconstants.CallType.NotDeletedStatusValue');
        $dispositions = Disposition::where(['IsDeleted'=>'N'])->get();
        return view('view-dispositions',compact('dispositions'));
    }
    public function addDisposition(Request $request){
        $id = $request->id ;
        return view('add-disposition')->with('id',$id);
    }
    public function createDisposition(Request $request){
        $activeby = Session::get('userId');
        $validated = $request->validate([
            'disposition' => 'required|max:255',
        ]);
        $getDispositionData = Disposition::where(['Name'=>$request->disposition])->where(['CallTypeId'=>$request->call_type_id])->get();
        $count = count($getDispositionData);
        if($count > 0){
            return redirect('view-disposition')->with('error','The entered disposition is already Exist!');
        }else{
            Disposition::create([
            'Name' => $request->disposition,
            'Active'=> $request->status,
            'CallTypeId'=> $request->call_type_id,
            'EnterBy' => $activeby,
         ]);
         return redirect('view-disposition')->with('success','The disposition added Successfuly!');
        }
    }
    public function editDisposition(Request $request){
        $dispositions = Disposition::where(['id'=>$request->id])->get();
        foreach($dispositions as $disposition){
            $id = $disposition->CallTypeId;
        }
        return view('add-disposition',compact('dispositions','id'));
    }
    public function updateDisposition(Request $request){

        $validated = $request->validate([
            'disposition' => 'required|max:255',
        ]);

        $activeby = Session::get('userId');
        Disposition::where(['id'=>$request->id])->update([
            'Name' => $request->disposition,
            'Active'=> $request->status,
            'CallTypeId'=> $request->call_type_id,
            'EnterBy' => $activeby,
         ]);
         return redirect('view-disposition')->with('success','The disposition added Successfuly!');
    }
    public function dispositionDetail(Request $request){
        $detail_id = $request->id;
        $disposition = [];
        $update = false;
        return view('add-disposition-detail',compact('detail_id','disposition','update'));
    }
    public function addDispositionDetail(Request $request){

        $validated = $request->validate([
            'disposition_type' => 'required',
        ]);
        $activeby = Session::get('userId');
        //$CallTypeID = Config::get('globalconstants.CallTypeId');
        $detail_id = $request->detail_id;
        $unique = array_unique($request->disposition_type);
        $data = [];
        // $getDispositionDetail = DispositionDetail::whereIn('DispositionQuery',$unique)->get();
        $getDispositionDetail = DB::table('dispositions as d')->select(DB::raw('d.id,d.CallTypeId'))
                              ->join('disposition_details as dd','d.id','=','dd.DispositionId')
                              ->where(['d.id'=>$detail_id])
                              ->whereIn('dd.DispositionQuery',$unique)
                              ->get();
        //dd($getDispositionDetail);
        $count = count($getDispositionDetail);
        if($count > 0){
            return redirect('view-disposition-detail')->with('error','The entered disposition is already Exist!');
        }
        else{
            foreach($request->disposition_type as $disposition){
                $getDispositionCallTypeId = Disposition::where('id',$request->detail_id)->get();
                foreach($getDispositionCallTypeId as $call_type_id){
                    DispositionDetail::create([
                        'DispositionQuery' => $disposition,
                        'DispositionId' => $request->detail_id,
                        'CallTypeId' => $call_type_id->CallTypeId ,
                        'Active' => $request->status,
                        'EnterBy'=> $activeby
                    ]);
                }
            }
            return redirect('view-disposition-detail')->with('success','The Disposition Detail Added successfuly!');
        }
    }
    public function viewDispositionDetail(Request $request){
        $DeleteStatusID = Config::get('globalconstants.CallType.NotDeletedStatusValue');
        $getDispositionDetail = DispositionDetail::with('getDisposition')->where(['isDeleted' => $DeleteStatusID])->get();
        return view('view-dispositions-detail',compact('getDispositionDetail'));
    }
    public function editDispositionDetail(Request $request){
        $disposition = DispositionDetail::where(['id'=>$request->id])->firstOrFail();
        $update = true;
        return view('add-disposition-detail',compact('disposition','update'));
    }
    public function updateDispositionDetail(Request $request){
        $validated = $request->validate([
            'disposition_type' => 'required',
        ]);
        $activeby = Session::get('userId');
        DispositionDetail::where(['id'=>$request->id])->update([
            'DispositionQuery' => $request->disposition_type[0],
            'EnterBy' => $activeby,
            'Active' => $request->status,
            'EnterBy' => $activeby
         ]);
        return redirect('view-disposition-detail')->with('success','The Disposition Detail Updated successfuly!');
    }
    public function deleteDisposition(Request $request){
        $DeleteStatusID = Config::get('globalconstants.CallType.DeletedStatusValue');
        $Deletedby = Session::get('userId');
        Disposition::where(['id'=>$request->id])->update(['IsDeleted'=>$DeleteStatusID,'DeletedBy'=>$Deletedby]);
        return redirect('view-disposition')->with('success','The Disposition Deleted successfuly!');
    }
    public function deleteDispositionDetail(Request $request){
        $DeleteStatusID = Config::get('globalconstants.CallType.DeletedStatusValue');
        $Deletedby = Session::get('userId');
        DispositionDetail::where(['id'=>$request->id])->update(['IsDeleted'=>$DeleteStatusID,'DeletedBy'=>$Deletedby]);
        return redirect('view-disposition-detail')->with('success','The Disposition Deleted successfuly!');
    }
}
