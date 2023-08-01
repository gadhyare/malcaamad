<?php

namespace App\Http\Livewire\Admin\Finance\Reports;

use App\Models\Allowance;
use Livewire\Component;
use App\Models\Invoices;
use App\Models\BillingCycle;
use App\Models\EmployeeSalary;
use App\Models\Expensess;

class ByBillingCycle extends Component
{

    public $billingCycleId;
    public function render()
    {
        $billingCycles = BillingCycle::get();


        $initial_balance = BillingCycle::where('id' ,  '=', $this->billingCycleId)->first();

        $paid_amount = Invoices::join('fee_trans', 'invoice.id', '=', 'fee_trans.invoice_id')
                                        ->where('invoice.billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('fee_trans.amount');

        $total_of_want = Invoices::where('billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('want');

        $total_of_discount = Invoices::join('fee_trans', 'invoice.id', '=', 'fee_trans.invoice_id')
                                        ->where('invoice.billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('fee_trans.descount');

        $total_of_allowance = Allowance::where('billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('amount');
        $total_of_expenses = Expensess::where('billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('amount');
        $total_of_employee_basic_sallary = EmployeeSalary::where('billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('basic_amount');
        $total_of_employee_net_sallary = EmployeeSalary::where('billing_cycles_id' ,  '=', $this->billingCycleId)
                                        ->sum('net_amount');

        return view('livewire.admin.finance.reports.by-billing-cycle' , [
                                            'billingCycles' => $billingCycles ,
                                            'total_of_want' => $total_of_want,
                                            'paid_amount' => $paid_amount ,
                                            'total_of_discount' => $total_of_discount,
                                            'total_of_allowance' => $total_of_allowance,
                                            'total_of_expenses' => $total_of_expenses,
                                            'total_of_employee_net_sallary' => $total_of_employee_net_sallary,
                                            'initial_balance' => $initial_balance
                                            ] );
    }
}
