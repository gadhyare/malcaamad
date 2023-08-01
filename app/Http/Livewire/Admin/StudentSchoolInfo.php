<?php

namespace App\Http\Livewire\Admin;


use App\Models\Classes;
use App\Models\Groups;
use App\Models\Levels;
use App\Models\Sections;
use App\Models\Shifts;
use Livewire\Component;


use App\Models\StudentsSchoolInfo as StudentsSchoolInfoModel;
use Illuminate\Http\Request;

use Livewire\WithPagination;
class StudentSchoolInfo extends Component
{
    use WithPagination;

    public $students_info_id;
    public $levels_id;
    public $classes_id;
    public $groups_id;
    public $shifts_id;
    public $sections_id;
    public $registered_date ;
    public $discount = 0;
    public $active =  1;
    public $event ;
    public $updateId ;
    public $search = '';

    public $btnTitle = "اضافة";
    public $per_page = 10;

    public $getId;

    public $info = 0;

    public $stu_id ;
    protected $rules = [
        'levels_id' => 'required',
        'classes_id' => 'required',
        'groups_id' => 'required',
        'shifts_id' => 'required',
        'sections_id' => 'required',
        'registered_date' => 'required',
        'discount' => 'required',
        'active' => 'required',
    ];

    protected $paginationTheme = 'bootstrap';


    public function mount( )
    {
         $this->stu_id = request('stu_id');
    }


    public function render(  )
    {
        $students = StudentsSchoolInfoModel::where('levels_id', 'like', '%'.$this->search.'%')->paginate($this->per_page);


        return view('livewire.admin.student-school-info' , ['students' => $students ,
                                                                'levels' => $this->levels() ,
                                                                'classes' => $this->classes(),
                                                                'groups' => $this->groups() ,
                                                                'shifts' => $this->shifts() ,
                                                                'sections' => $this->sections(),
                                                                ]
                                                        );
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function add( )
    {


        $this->validate();

        if ($this->updateId) {
            $this->DoupdateRec($this->updateId);
        } else {


            StudentsSchoolInfoModel::create([
                'students_info_id' =>  $this->stu_id,
                'levels_id' => $this->levels_id,
                'classes_id' => $this->classes_id,
                'shifts_id' => $this->shifts_id,
                'groups_id' => $this->groups_id,
                'sections_id' => $this->sections_id,
                'registered_date' => $this->registered_date,
                'discount' => $this->discount,
                'active' => $this->active,

            ]);


            return redirect(route('school.record' , $this->stu_id))->with('status', 'تمت الاضافة بنجاح');
        }

        $this->reset();
    }


    public function updateRec( $id)
    {


        $students = StudentsSchoolInfoModel::where('id', $id)->first();

        $this->students_info_id = $students->students_info_id;
        $this->levels_id = $students->levels_id;
        $this->classes_id = $students->classes_id;
        $this->groups_id = $students->groups_id;
        $this->shifts_id = $students->shifts_id;
        $this->sections_id = $students->sections_id;
        $this->registered_date = $students->registered_date;
        $this->discount = $students->discount;
        $this->active = $students->active;

        $this->updateId = $students->id;

        $this->btnTitle = "تعديل";

    }


    public function DoupdateRec($id )
    {


        $students = StudentsSchoolInfoModel::where('id', '=', $id)->first();

        $students->students_info_id = $this->students_info_id;
        $students->levels_id = $this->levels_id;
        $students->classes_id = $this->classes_id;
        $students->groups_id = $this->groups_id;
        $students->shifts_id = $this->shifts_id;
        $students->sections_id = $this->sections_id;
        $students->registered_date = $this->registered_date;
        $students->discount = $this->discount;
        $students->active = $this->active;

        $students->update();

        $this->btnTitle = "اضافة";
        $this->reset();
        // $this->dispatchBrowserEvent('hide-modal');
        return redirect(route('school.record' , $students->students_info_id))->with('status', 'تمت التعديل بنجاح');
    }

    public function deleteRec( $id)
    {


        StudentsSchoolInfoModel::where('id', '=', $id)->first()->delete();

        // $this->dispatchBrowserEvent('hide-modal');

        return redirect(route('school.record' , $this->stu_id))->with('status', 'تمت الحذف بنجاح');
    }


    //////////////////////////////////// get more information ///////

    public function levels()
    {
        $levels = Levels::where('active' , '=' , '1')->get();

        return $levels;
    }

    public function classes()
    {
        $classes = Classes::where('active' , '=' , '1')->get();

        return $classes;
    }

    public function groups()
    {
        $groups = Groups::where('active' , '=' , '1')->get();

        return $groups;
    }

    public function shifts()
    {
        $shifts = Shifts::where('active' , '=' , '1')->get();

        return $shifts;
    }

    public function sections()
    {
        $sections = Sections::where('active' , '=' , '1')->get();

        return $sections;
    }


}
