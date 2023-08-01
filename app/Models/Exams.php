<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;



    protected $fillable = [
        'students_info_id' ,
        'shifts_id',
        'sections_id',
        'groups_id',
        'subjects_distributions_id',
        'levels_id' ,
        'classes_id',
        'qu1',
        'ex1',
        'qu2',
        'ex2',
        'att',
    ];


    public function students_info( )
    {
        return $this->belongsTo(Students_info::class , 'students_info_id');
    }



    public function subjects_distributions(){
        return $this->belongsTo(SubjectsDistribution::class  , 'subjects_distributions_id' );
    }


    public function levels( )
    {
        return $this->belongsTo(Levels::class );
    }


    public function classes( )
    {
        return $this->belongsTo(Classes::class );
    }


}
