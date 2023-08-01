<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesValue extends Model
{
    use HasFactory;



    protected $table = "fees_values";

    protected $fillable = [
        'amount' ,
        'feestypes_id' ,
        'levels_id',
        'classes_id',
        'active',
    ];




    public function feestypes( )
    {

        return $this->belongsTo(FeesType::class , 'feestypes_id');
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
