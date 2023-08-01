<?php

namespace App\Http\Livewire\Admin\Exams;


use App\Models\Exams;
use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use Livewire\Component;
use App\Models\Sections;
use App\Models\Students;
use App\Models\StudentsSchoolInfo;
use App\Exports\StudentsListExport;
use App\Models\SubjectsDistribution;

class ClassExamReport extends Component
{
    public $subjects_distributions_id;
    public $students_info_id;
    public $shifts_id;
    public $sections_id;
    public $groups_id;
    public $qu1 = 0;
    public $ex1 = 0;
    public $qu2 = 0;
    public $ex2 = 0;
    public $att = 0;
    public $levels;
    public $classes_id;
    public $getAllLevels;
    public $subjects_id;

    public $total = 0;

    public $updateId;

    public $btnTitle = "اضافة";

    public $search = '';

    public $msg;
    public $per_page = 10;
    protected $rules = [
        'qu1' => 'required',
        'ex1' => 'required',
        'qu2' => 'required',
        'ex2' => 'required',
        'att' => 'required',
    ];



    public function mount()
    {
        $getLevels = Levels::where('active', '1')->get();

        $this->getAllLevels = $getLevels;
    }

    public function render()
    {

        $classes = Classes::where('levels_id',    $this->levels)->get();
        $groups = Groups::where('active',    '1')->get();
        $shifts = Shifts::where('active',    '1')->get();
        $sections = Sections::where('active',    '1')->get();
        $subjects_distributions  = SubjectsDistribution::where('levels_id',    $this->levels)->where('classes_id', $this->classes_id)->get();

        $students = StudentsSchoolInfo::where('levels_id', $this->levels)
            ->where('classes_id', $this->classes_id)
            ->where('groups_id', $this->groups_id)
            ->where('shifts_id', $this->shifts_id)
            ->where('sections_id', $this->sections_id)
            ->get();

            if($subjects_distributions){
                $exams = Exams::where('groups_id', $this->groups_id)
                                        ->where('shifts_id', $this->shifts_id)
                                        ->where('sections_id', $this->sections_id)->get();
            }



        return view(
            'livewire.admin.exams.class-exam-report',
            [
                'classes' => $classes,
                'subjects_distributions' => $subjects_distributions,
                'groups' => $groups,
                'shifts' => $shifts,
                'sections' => $sections,
                'students' => $students,
                'exams' => $exams,
            ]
        );
    }


    public function get_data_to_update($rec_id)
    {
        $this->updateId = $rec_id;




        $info =  Exams::where('id', '=', $this->updateId)->first();


        $this->qu1 = $info->qu1;
        $this->ex1 = $info->ex1;
        $this->qu2 = $info->qu2;
        $this->ex2 = $info->ex2;
        $this->att = $info->att;

        $this->total = (int) $this->qu1 + (int)  $this->ex1 + (int)  $this->qu2 + (int)  $this->ex2 + (int)  $this->att;
    }

    public function exportToExcel()
    {
        return (new  StudentsListExport($this->levels_id, $this->classes_id, $this->groups_id, $this->shifts_id, $this->sections_id))->download('list.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }




    public function resetData()
    {
        $this->reset(['updateId']);
    }



    public function getTotal()
    {
        $this->total = (int) $this->qu1 + (int)  $this->ex1 + (int)  $this->qu2 + (int)  $this->ex2 + (int)  $this->att;
    }


    public function updateRec($rec_id)
    {

        $this->validate();

        $info =  Exams::where('id', '=', $this->updateId)->first();


        if ($info) {
            $info->qu1 = $this->qu1;
            $info->ex1 = $this->ex1;
            $info->qu2 = $this->qu2;
            $info->ex2 = $this->ex2;
            $info->att = $this->att;

            $info->update();


            $this->reset(['updateId']);
        }
    }
}
