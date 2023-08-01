<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;


    public $fillable = [
        'name',
        'active',
    ];




    public function subjects_distributions()
    {
        return $this->hasMany(subjects_distributions::class);
    }






}
