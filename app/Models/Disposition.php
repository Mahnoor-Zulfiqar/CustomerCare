<?php
/*  Author : Mahnoor Zulfiqar 
    Date : 3-14-2022
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    use HasFactory;
    protected $fillable = ['id','CallTypeId','Name','Active','EnterBy','IsDeleted','DeletedBy']; 
}
