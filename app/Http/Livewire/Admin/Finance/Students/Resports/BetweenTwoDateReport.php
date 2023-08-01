<?php

namespace App\Http\Livewire\Admin\Finance\Students\Resports;

use Livewire\Component;
use App\Models\FeeTrans;

class BetweenTwoDateReport extends Component
{
    public $from;
    public $to;

    public $feestypes;



    public function render()
    {
        $feetrans = FeeTrans::wherebetween('paid_date' , [$this->from, $this->to])->get();

        return view('livewire.admin.finance.students.resports.between-two-date-report' , ['feetrans' => $feetrans]);
    }
}
