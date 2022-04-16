<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id','DispositionQuery','DispositionId','Name','CallTypeId','EnterBy','IsDeleted','DeletedBy'];

    public function getDisposition(){
        return $this->belongsTo('App\Models\Disposition','DispositionId','id');
    }
}
