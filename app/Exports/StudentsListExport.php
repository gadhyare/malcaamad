<?php

namespace App\Exports;

use App\Models\StudentsSchoolInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsListExport implements FromCollection , WithMapping , WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */


    public $levels_id;
    public $classes_id;
    public $groups_id;
    public $shifts_id;
    public $sections_id;
    public function __construct($levels_id, $classes_id, $groups_id, $shifts_id, $sections_id)
    {
        $this->levels_id = $levels_id;
        $this->classes_id = $classes_id;
        $this->groups_id = $groups_id;
        $this->shifts_id = $shifts_id;
        $this->sections_id = $sections_id;
    }



    public function collection()
    {
        $students_info =  StudentsSchoolInfo::where('levels_id' , '=', $this->levels_id)
                        ->where('classes_id' , '=', $this->classes_id)
                        ->where('groups_id' , '=', $this->groups_id)
                        ->where('shifts_id' , '=', $this->shifts_id)
                        ->where('sections_id' , '=', $this->sections_id)
                        ->get();

                        return $students_info;
    }



    public function map($students_info):array
    {
        return [
                $students_info->studentInfo->name . ' ' . $students_info->studentInfo->father->name,
                $students_info->studentInfo->id  . '-' . $students_info->studentInfo->father->number,

        ];
    }




    public function headings(): array
    {
        return [
            'اسم الطالب',
            'رقم الطالب',
            'أعمال السنة 1' ,
            'اختبار نصفي' ,
            'أعمال السنة 2' ,
            'اختبار نهائي' ,
            'المجموع'
        ];
    }



    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true); // this change
            },
        ];
    }

}
