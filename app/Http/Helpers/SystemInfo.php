<?php

use App\Models\Employee_finance;
use App\Models\Settings;
use App\Models\Students_info;
use Illuminate\Support\Facades\DB;
use App\Models\Employee_debt;
use App\Models\Employee_deduction;
class SystemInfo
{


    static public function setting(string $value)
    {
        $set = Settings::first();
        return $set->{$value}?? '';
    }








    static function onesDigits($num): string
    {

        $number[0] = 'صفر';

        return $number[$num];
    }



    static function tensDigits($num): string
    {

        $number[10] = 'عشرة';

        return $number[$num];
    }



    static function numberToWord($num): string
    {
        $numToArray =   array_map('intval', str_split($num));


        $countNumber = count((array) $numToArray);



        if ($countNumber == 0) {
            $value = 0;
        }


        if ($countNumber == 1) {
            $value = self::onesDigits($num);
        }

        if ($countNumber == 2 && $numToArray[1] == 0) {
            $value = self::tensDigits($num);
        }

        return $value;
    }



    static public function get_current_student_previous_balance($stu_id, $id)
    {


        $totalOfWantForCurrentStudent =  DB::table('invoice')
            ->where('students_info_id', '=', $stu_id)
            ->where('invoice.id',  '<', $id)
            ->sum('want');

        $totalOfPaymentForCurrentStudent =  DB::table('fee_trans')
            ->where('students_info_id', '=', $stu_id)
            ->where('invoice_id',  '<', $id)
            ->sum('amount');


        $totalOfDescountForCurrentStudent =  DB::table('fee_trans')
            ->where('students_info_id', '=', $stu_id)
            ->where('invoice_id',  '<', $id)
            ->sum('descount');


        return $totalOfWantForCurrentStudent - $totalOfPaymentForCurrentStudent - $totalOfDescountForCurrentStudent ?? 0;
    }




    static public function get_full_student_name($id)
    {
        $info =  Students_info::where('id', '=', $id)->first();
        return $info->first_name . ' ' . $info->middle_name . ' ' . $info->last_name . ' ' . $info->family_name;
    }


    static public function get_employee_finance($emp_id)
    {
        $info =  Employee_finance::where('employees_info_id', '=', $emp_id)->sum('amount');
        return $info;
    }



    static public function get_employee_net_sallary($emp_id,$billing_cycles_id)
    {
        $number =  $emp_id;
        $employees_debts = Employee_debt::where('employees_info_id' ,'=' , $number)->where('billing_cycles_id' ,'=' , $billing_cycles_id)->sum('amount');
        $employees_finances = Employee_finance::where('employees_info_id' ,'=' , $number)->sum('amount');
        $employees_deductions = Employee_deduction::where('employees_info_id' ,'=' , $number)->where('billing_cycles_id' ,'=' , $billing_cycles_id)->sum('amount');
        $total =  $employees_finances - ($employees_debts + $employees_deductions);
        return $total;
    }

}
