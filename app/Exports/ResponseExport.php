<?php

namespace App\Exports;

use App\Models\CCDResponse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ResponseExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CCDResponse::select(['id','EmployeeId','CallTypeId','DispositionId','DispositionDetailId','ClientName','ContactNumber','Address','Comment','Property','FutureInvestment'])->get();
    }
    public function headings(): array
    {
        return ["Sr#", "Employee Id","Call Type Id","Disposition Id","Disposition Detail Id","Client Name","Contact Number","Address","Comment","Property","FutureInvestment"];
    }
}
