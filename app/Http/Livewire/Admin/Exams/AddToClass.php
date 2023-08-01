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

class AddToClass extends Component
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


    public $updateId;

    public $btnTitle = "اضافة";

    public $search = '';

    public $per_page = 10;
    protected $rules = [
        'subjects_distributions_id' => 'required',
        'students_info_id' => 'required',
        'shifts_id' => 'required',
        'sections_id' => 'required',
        'groups_id' => 'required',
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


        return view(
            'livewire.admin.exams.add-to-class',
            [
                'classes' => $classes,
                'subjects_distributions' => $subjects_distributions,
                'groups' => $groups,
                'shifts' => $shifts,
                'sections' => $sections,
                'students' => $students
            ]
        );




    }


    public function exportToExcel(   )
    {
        return (new  StudentsListExport($this->levels_id, $this->classes_id, $this->groups_id, $this->shifts_id, $this->sections_id) )->download('list.xlsx' , \Maatwebsite\Excel\Excel::XLSX );
    }



}
