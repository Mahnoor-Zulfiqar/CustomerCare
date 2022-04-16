<?php

/*  Author : Mahnoor Zulfiqar
    Date : 3-14-2022
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disposition;
use App\Models\DispositionDetail;
class CCDResponse extends Model
{
    use HasFactory;
    protected $fillable = ['id','EmployeeId','CallTypeId','BranchId','DispositionId','DispositionDetailId','ClientName','ContactNumber','Address','Comment','Property','FutureInvestment','IsDeleted','DeletedBy'];

public function getDisposition(){
    return $this->belongsto('App\Models\Disposition','DispositionId','id');
}
public function getDispositionDetail(){
    return $this->belongsto('App\Models\DispositionDetail','DispositionDetailId','id');
}
}
