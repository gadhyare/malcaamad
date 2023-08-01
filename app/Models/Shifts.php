<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
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


    public function invoice()
    {
        $this->hasMany(Invoices::class  );

    }
}
