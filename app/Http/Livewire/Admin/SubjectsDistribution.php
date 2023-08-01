<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


use Livewire\WithPagination;

use App\Models\SubjectsDistribution as SubjectsDistributionModel;
use App\Models\Subjects;
use App\Models\Levels;
use App\Models\Classes;



class SubjectsDistribution extends Component
{

        use WithPagination;
        public $subjects_id;
        public $levels_id;
        public $classes_id = 1;

        public $max_mark = 100  ;
        public $min_mark = 50;

        public $rank = 1;
        public $active = 1;

        public $updateId;

        public $btnTitle = "اضافة";


        public $search = '';

        public $per_page = 10;

        public $deleteId;

        protected $listeners  = [ 'deleteConfirmed' => 'deleteRec'];



        protected $rules = [
            'subjects_id' => 'required',
            'levels_id' => 'required',
            'classes_id' => 'required',
            'max_mark' => 'required',
            'min_mark' => 'required',
            'rank' => 'required',
            'active' => 'required',
        ];


        protected $paginationTheme = 'bootstrap';
        public function render()
        {
            $levels = Levels::where('active', '=', '1')->get();
            $subjects = Subjects::where('active', '=', '1')->get();
            $classes = Classes::where('active', '=', '1'  )->where('levels_id' , $this->levels_id)->get();
            $SubjectsDistributions = SubjectsDistributionModel::where('levels_id' , $this->levels_id)->where('classes_id' , $this->classes_id)->paginate($this->per_page);
            return view('livewire.admin.subjects-distribution',
                                                    [ 'SubjectsDistributions' => $SubjectsDistributions ,
                                                    'subjects' => $subjects ,'levels' => $levels, 'classes' => $classes]);
        }


        public function updatingSearch()
        {
            $this->resetPage();
        }


        public function checkOpration()
        {
            $this->validate();
            if ($this->updateId) {
                $this->DoupdateRec($this->updateId);
            } else {
                if(SubjectsDistributionModel::create([
                    'subjects_id' =>  $this->subjects_id,
                    'levels_id' =>  $this->levels_id,
                    'classes_id' =>  $this->classes_id,
                    'max_mark' =>  $this->max_mark,
                    'min_mark' =>  $this->min_mark,
                    'rank' =>  $this->rank,
                    'active' =>  $this->active,
                ])){
                    $this->dispatchBrowserEvent('success-opration');
                    $this->reset();
                }
            }
        }


        public function updateRec($id)
        {
            $subjects = SubjectsDistributionModel::where('id',  '=', $id)->first();
            $this->subjects_id = $subjects->subjects_id;
            $this->levels_id = $subjects->levels_id;
            $this->classes_id = $subjects->classes_id;
            $this->max_mark = $subjects->max_mark;
            $this->min_mark = $subjects->min_mark;
            $this->rank = $subjects->rank;
            $this->active = $subjects->active;
            $this->updateId = $subjects->id;
            $this->btnTitle = "تعديل";
        }


        public function DoupdateRec($id)
        {

            $subjects = SubjectsDistributionModel::where('id', '=', $id)->first();
            $subjects->subjects_id = $this->subjects_id;
            $subjects->levels_id = $this->levels_id;
            $subjects->classes_id = $this->classes_id;
            $subjects->max_mark = $this->max_mark;
            $subjects->min_mark = $this->min_mark;
            $subjects->rank = $this->rank;
            $subjects->active = $this->active;

            if($subjects->update()){
                $this->dispatchBrowserEvent('success-opration');
                $this->reset();
            }

        }
        public function deleteRec( )
        {
            SubjectsDistributionModel::where('id', '=', $this->deleteId)->first()->delete();
        }


        public function deleteConfirmation($rec_id){
            $this->deleteId = $rec_id;
            $this->dispatchBrowserEvent( 'show-delete-confirmation' );
        }


        public function cancel(){
            $this->reset(
                'subjects_id',
                'max_mark',
                'min_mark',
                'rank',
                'active',
                'deleteId' ,
                'updateId',
                'btnTitle'
            );
        }
}
