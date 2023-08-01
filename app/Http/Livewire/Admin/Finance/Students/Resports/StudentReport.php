<?php

namespace App\Http\Livewire\Admin\Finance\Students\Resports;

use Livewire\Component;
use App\Models\FeeTrans;

class StudentReport extends Component
{

    public $from;
    public $to;
    public $students_info_id;




    public function render()
    {
        $feetrans = FeeTrans::join('invoice', 'fee_trans.invoice_id', '=', 'invoice.id')
                        ->where('invoice.students_info_id' , '=' , $this->students_info_id)
                        ->wherebetween('paid_date' , [$this->from, $this->to])
                        ->get(['fee_trans.*' ,'invoice.*' ]);



        return view('livewire.admin.finance.students.resports.student-report' , ['feetrans' => $feetrans]);



    }
}
