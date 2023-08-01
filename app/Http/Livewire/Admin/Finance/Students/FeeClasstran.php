<?php

namespace App\Http\Livewire\Admin\Finance\Students;

use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use Livewire\Component;
use App\Models\FeesType;
use App\Models\Sections;
use App\Models\FeesValue;
use App\Models\Invoices;
use App\Models\BillingCycle;
use App\Models\StudentsSchoolInfo;

class FeeClasstran extends Component
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
    public $amount;

    public $feestypes;
    public $feestypes_id;

    public $active = 1;
    public $per_page = 10;

    public $billingsFrom;
    public $billingsTo;
    public $billingsId;



    public $data;
    public $result;
    public $get_feestypes;

    protected $paginationTheme = 'bootstrap';




    protected $rules = [
        'levels_id' => 'required',
        'classes_id' => 'required',
        'groups_id' => 'required',
        'shifts_id' => 'required',
        'sections_id' => 'required',
        'feestypes_id' => 'required',
    ];


    public function mount()
    {

        $this->levels = Levels::where('active', '=', '1')->get();
        $this->shifts = Shifts::where('active', '=', '1')->get();
        $this->sections = Sections::where('active', '=', '1')->get();
        $this->groups = Groups::where('active', '=', '1')->get();
        $this->classes = Classes::where('active', '=', '1')->get();
        $this->feestypes = FeesType::where('active', '=', '1')->get();



        $billings = BillingCycle::where('active', '=', 1)->first();

        $this->billingsFrom = $billings->from;
        $this->billingsTo = $billings->to;
        $this->billingsId = $billings->id;

    }
    public function render()
    {
        $students = StudentsSchoolInfo::where('levels_id', $this->levels_id)
            ->where('classes_id', $this->classes_id)
            ->where('groups_id', $this->groups_id)
            ->where('shifts_id', $this->shifts_id)
            ->where('sections_id', $this->sections_id)
            ->paginate($this->per_page);


        $feeValue = FeesValue::where('levels_id', $this->levels_id)
        ->where('classes_id', $this->classes_id)
        ->where('feestypes_id', $this->feestypes_id)
        ->first();


        if($feeValue){
            $this->amount = $feeValue->amount;
        }else{
            $this->amount =0;
        }

        return view('livewire.admin.finance.students.fee-classtran', ['students' => $students , 'feeValue' => $feeValue]);


    }




    public function add()
    {

        $this->validate();
        $students = StudentsSchoolInfo::where('levels_id', $this->levels_id)
                            ->where('classes_id', $this->classes_id)
                            ->where('groups_id', $this->groups_id)
                            ->where('shifts_id', $this->shifts_id)
                            ->where('sections_id', $this->sections_id)
                            ->get();




            foreach($students as $student):
                if(!$this->get_sel_cls_fee_info($student->students_info_id)){
                    if($this->active == 1){
                        $want = $this->amount - $student->discount;
                    }else {
                        $want = $this->amount ;
                    }
                    Invoices::create([
                        'billing_cycles_id' => $this->billingsId,
                        'students_info_id' => $student->studentInfo->id,
                        'levels_id' => $this->levels_id,
                        'classes_id' => $this->classes_id,
                        'groups_id' => $this->groups_id,
                        'shifts_id' => $this->shifts_id,
                        'sections_id' => $this->sections_id,
                        'feestypes_id' => $this->feestypes_id,
                        'want' => $want,
                        'discount' => $student->discount,
                        'account_statuse' => 1,
                    ]);
                }
            endforeach;



            $this->dispatchBrowserEvent('success-opration');
    }




    public function get_sel_cls_fee_info( $students_info_id )
    {


        $info = Invoices::where('levels_id', $this->levels_id)
                        ->where('classes_id', $this->classes_id)
                        ->where('groups_id', $this->groups_id)
                        ->where('shifts_id', $this->shifts_id)
                        ->where('sections_id', $this->sections_id)
                        ->where('students_info_id', $students_info_id)
                        ->first();



        if($info){
            return true ;
        }
    }


}
