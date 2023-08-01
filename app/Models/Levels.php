<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'active'
    ];



    public function student_school_info()
    {
        return $this->hasMany(StudentsSchoolInfo::class);
    }



    public function subjects_distributions()
    {
        return $this->hasMany(subjects_distributions::class);
    }



    public function classes()
    {
        return $this->hasMany(Classes::class);
    }


    public function feesvalue()
    {
        $this->hasMany(FeesValue::class);

    }

    public function invoice()
    {
        $this->hasMany(Invoices::class  );

    }


    public function exams()
    {
        $this->hasMany(Exams::class  );

    }
}
