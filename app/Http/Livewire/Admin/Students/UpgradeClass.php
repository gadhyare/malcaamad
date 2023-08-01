<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use Livewire\Component;
use App\Models\Sections;
use App\Models\StudentsSchoolInfo;

class UpgradeClass extends Component
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

    public $update_levels_id;
    public $update_classes_id;
    public $update_groups_id;
    public $update_shifts_id;
    public $update_sections_id;

    public $per_page = 10;
    protected $rules = [
        'levels_id' => 'required',
        'classes_id' => 'required',
        'groups_id' => 'required',
        'shifts_id' => 'required',
        'sections_id' => 'required',
        'update_levels_id' => 'required',
        'update_classes_id' => 'required',
        'update_groups_id' => 'required',
        'update_shifts_id' => 'required',
        'update_sections_id' => 'required',
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


        return view('livewire.admin.students.upgrade-class', ['students' => $students]);
    }


    public function upgrade()
    {
        $this->validate();


        StudentsSchoolInfo::where('levels_id', $this->levels_id)
            ->where('classes_id', $this->classes_id)
            ->where('groups_id', $this->groups_id)
            ->where('shifts_id', $this->shifts_id)
            ->where('sections_id', $this->sections_id)
            ->update([
                'levels_id' => $this->update_levels_id,
                'classes_id' => $this->update_classes_id,
                'groups_id' => $this->update_groups_id,
                'shifts_id' => $this->update_shifts_id,
                'sections_id' =>  $this->update_sections_id,
            ]);
    }
}
