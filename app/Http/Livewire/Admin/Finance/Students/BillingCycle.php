<?php

namespace App\Http\Livewire\Admin\Finance\Students;

use App\Models\BillingCycle as ModelsBillingCycle;
use Livewire\Component;
use Livewire\WithPagination;

class BillingCycle extends Component
{
    use WithPagination;
    public $from;
    public $to ;
    public $active = 1;

    public $per_page = 10;


    public $initial_balance;
    public $updateId;
    public $deleteId;

    public $btnTitle = "اضافة";

    public $billings;
    protected $paginationTheme = 'bootstrap';


    public $color = "success";

    protected $listeners  = [ 'deleteConfirmed' => 'deleteRec'];
    protected $rules = [
        'initial_balance' => 'required',
        'from' => 'required',
        'to' => 'required',
    ];


    public function render()
    {
        $this->billings = ModelsBillingCycle::get();
        return view('livewire.admin.finance.students.billing-cycle');
    }


    public function search()
    {
        $this->validate();
        $this->billings = ModelsBillingCycle::whereDate('from', '<=', $this->from)
            ->whereDate('to', '>=', $this->to)
            ->get();
    }


    public function add()
    {

        $this->validate();

        if ($this->updateId) {
            $this->DoupdateRec($this->updateId);
        } else {
            ModelsBillingCycle::create([
                'initial_balance' => $this->initial_balance,
                'from' => $this->from,
                'to' => $this->to,
                'active' => $this->active,
            ]);
        }
        $this->reset();
    }


    public function updateRec($id)
    {

        $billing = ModelsBillingCycle::where('id',  '=', $id)->first();

        $this->initial_balance = $billing->initial_balance;
        $this->from = $billing->from;
        $this->to = $billing->to;
        $this->active = $billing->active;

        $this->updateId = $billing->id;
        $this->btnTitle = "تعديل";
        $this->color= "primary";

    }


    public function DoupdateRec($id)
    {

        $billing = ModelsBillingCycle::where('id', '=', $id)->first();

        $billing->initial_balance = $this->initial_balance;
        $billing->from = $this->from;
        $billing->to = $this->to;
        $billing->active = $this->active;


        $billing->update();

        $this->reset(['btnTitle']);
        $this->dispatchBrowserEvent('success-opration');
    }

    public function deleteRec( )
    {
        ModelsBillingCycle::where('id', '=', $this->deleteId)->first()->delete();
        $this->dispatchBrowserEvent('success-opration');

        $this->reset(['btnDelete']);
    }

    public function deleteConfirmation($rec_id){
        $this->deleteId = $rec_id;
        $this->dispatchBrowserEvent( 'show-delete-confirmation' );
    }


    public function cancel(){
        $this->reset();
    }


}
