<?php

namespace App\Models;

use App\Models\Groups;
use App\Models\Levels;
use App\Models\Shifts;
use App\Models\Classes;
use App\Models\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentsSchoolInfo extends Model
{
    use HasFactory;


    protected $table = "students_school_info";

    protected $fillable = [
        'students_info_id',
        'levels_id',
        'classes_id',
        'groups_id',
        'shifts_id',
        'sections_id',
        'registered_date',
        'discount',
        'active',

    ];



    public function classes( )
    {
        return $this->belongsTo(Classes::class );
    }



    public function levels( )
    {
        return $this->belongsTo(Levels::class );
    }


    public function groups( )
    {
        return $this->belongsTo(Groups::class );
    }


    public function shifts( )
    {
        return $this->belongsTo(Shifts::class );
    }

    public function sections( )
    {
        return $this->belongsTo(Sections::class );
    }

    public function studentInfo( )
    {
        return $this->belongsTo(Students_info::class, 'students_info_id'  );
    }
}
