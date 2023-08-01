<?php

namespace App\Http\Livewire\Admin\Finance\Students\Resports;

use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use Livewire\Component;
use App\Models\FeesType;
use App\Models\FeeTrans;
use App\Models\Invoices;
use App\Models\Sections;

class ClassesReport extends Component
{
    public $levels;
    public $shifts;
    public $sections;
    public $classes;
    public $groups;


    public $levels_id;
    public $classes_id;
    public $groups_id;
    public $shifts_id;
    public $sections_id;
    public $feestypes;
    public $feestypes_id;
    // public $feetrans;

    public $from;
    public $to;





    public function mount()
    {


        $this->levels = Levels::where('active', '=', '1')->get();
        $this->shifts = Shifts::where('active', '=', '1')->get();
        $this->sections = Sections::where('active', '=', '1')->get();
        $this->groups = Groups::where('active', '=', '1')->get();
        $this->classes = Classes::where('active', '=', '1')->get();
        $this->feestypes = FeesType::where('active', '=', '1')->get();
    }
    public function render()
    {

        $feetrans = FeeTrans::join('invoice', 'fee_trans.invoice_id', '=', 'invoice.id')
            ->where('invoice.levels_id', '=', $this->levels_id)
            ->where('invoice.classes_id', '=', $this->classes_id)
            ->where('invoice.groups_id', '=', $this->groups_id)
            ->where('invoice.shifts_id', '=', $this->shifts_id)
            ->where('invoice.sections_id', '=', $this->sections_id)
            ->where('invoice.feestypes_id', '=', $this->feestypes_id)
            ->wherebetween('paid_date', [$this->from, $this->to])
            ->get(['fee_trans.*', 'invoice.*']);


        return view('livewire.admin.finance.students.resports.classes-report', ['feetrans' =>  $feetrans]);
    }
}
