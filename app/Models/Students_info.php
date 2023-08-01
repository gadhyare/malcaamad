<?php

namespace App\Models;

use App\Models\FamilyNumber;
use App\Models\Strurel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students_info extends Model
{
    use HasFactory;

    protected $table = "students_info";

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'family_name',
        'fnumber_id',
        'mother',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'nationality',
        'address',
        'city',
        'phone',
        'photo',
        'registration_date'
    ];


    public function family_number( )
    {

        return $this->belongsTo(FamilyNumber::class , 'fnumber_id');
    }


    public function Strurel()
    {
        $this->hasMany(Strurel::class);

    }

    public function students_helth_record()
    {
        $this->hasMany(StudentHelthRecord::class);

    }

    public function exams()
    {
        $this->hasMany(Exams::class);

    }



    public function student_school_info()
    {
        return $this->hasMany(StudentsSchoolInfo::class  );
    }

    public function invoices()
    {
        return $this->hasMany(Invoices::class  , 'students_info_id' , 'id'  );
    }



}
