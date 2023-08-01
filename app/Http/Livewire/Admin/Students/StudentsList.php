<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use Livewire\Component;
use App\Models\Sections;
use Livewire\WithPagination;
use App\Models\StudentsSchoolInfo;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentsListExport;

class StudentsList extends Component
{

    use WithPagination;
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


    public $per_page = 10;


    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'levels_id' => 'required',
        'classes_id' => 'required',
        'groups_id' => 'required',
        'shifts_id' => 'required',
        'sections_id' => 'required',
    ];
    public function mount()
    {
        $this->levels = Levels::where('active', '=', '1')->get();
        $this->shifts = Shifts::where('active', '=', '1')->get();
        $this->sections = Sections::where('active', '=', '1')->get();
        $this->groups = Groups::where('active', '=', '1')->get();
        $this->classes = Classes::where('active', '=', '1')->get();
    }
    public function render()
    {
        $students = StudentsSchoolInfo::where('levels_id', $this->levels_id)
            ->where('classes_id', $this->classes_id)
            ->where('groups_id', $this->groups_id)
            ->where('shifts_id', $this->shifts_id)
            ->where('sections_id', $this->sections_id)
            ->paginate($this->per_page);

        return view('livewire.admin.students.students-list', ['students' => $students]);
    }


    public function add()
    {
        $this->validate();
    }


    public function exportData()
    {
        $this->validate();

        return (new StudentsListExport($this->levels_id, $this->classes_id, $this->groups_id, $this->shifts_id, $this->sections_id))
            ->download('ss.xlsx');
    }


    public function updateDate()
    {
        $this->validate();

        $data = DB::table('students_school_info')

        ->select('students_info.id','students_info.name'  )

        ->join('students_info','students_info.id','=','students_school_info.students_info_id')

        ->get();
    }
}
