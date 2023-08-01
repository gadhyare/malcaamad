<?php

namespace App\Http\Livewire\Admin\Finance\Students;

use Livewire\Component;
use App\Models\FeeTrans;
use App\Models\Invoices;
use Illuminate\Support\Facades\DB;

class FeePaid extends Component
{



    public $delete_id;

    protected $listeners  = [ 'deleteConfirmed' => 'deleteRec'];



    public function render()
    {


        $info = Invoices::join('billing_cycles', 'invoice.billing_cycles_id', '=', 'billing_cycles.id')
                        ->where('billing_cycles.active' , '=', 1)
                        ->get(['invoice.*' ]);

        return view('livewire.admin.finance.students.fee-paid' , ['infos' => $info]);
    }



    public function confrimDalete($rec_id){
        $this->delete_id = $rec_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteRec( )
    {
         if( Invoices::where('id' , '=' , $this->delete_id)->delete()){
            $this->dispatchBrowserEvent('success-opration');
            $this->reset(['delete_id']);
         }
    }



}
