<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentsSchoolInfo;
use Illuminate\Http\Request;
use App\Exports\StudentsListExport;
use App\Http\Controllers\Controller;
use App\Models\Strurel;
use App\Models\StudentHelthRecord;
use App\Models\Students_info;
use PDF;

class Students_infoController extends Controller
{



    public function index()
    {
        return view('admin.students.info.index');
    }

    public function list()
    {
        return view('admin.students.info.list');
    }
    public function upgrade()
    {
        return view('admin.students.info.upgrade');
    }
    public function register($fat_id)
    {
        return view('admin.students.info.register');
    }

    public function helth_record()
    {
        return view('admin.students.helth.index');
    }
    public function school_record($stu_id)
    {
        return view('admin.students.school.index');
    }

    public function student_attachment($stu_id)
    {
        return view('admin.students.attachment.index');
    }

    public function exportToExcel(   )
    {
        return view('admin.students.attachment.index');
    }


    public function printStudentInfo( $id  )
    {
        $students = Students_info::where('id' , '=' , $id)->first();
        $student_rels = Strurel::where('students_info_id' , '=' , $id)->get();
        $student_schools = StudentsSchoolInfo::where('students_info_id' , '=' , $id)->get();
        $student_helths = StudentHelthRecord::where('students_info_id' , '=' , $id)->get();
        return view('admin.students.info.print-current-student', ['students' => $students , 'id' =>$id ,
                                                                    'student_rels' => $student_rels,
                                                                    'student_schools' => $student_schools,
                                                                    'student_helths' => $student_helths]) ;

    }





}
