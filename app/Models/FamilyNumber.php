<?php

namespace App\Models;

use App\Models\Students_info;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyNumber extends Model
{
    use HasFactory;


    protected $table = "fnumber";
    protected $fillable = [
        'number',
        'active'
    ];





    public function student_info()
    {
        $this->hasMany(Students_info::class);
    }
}
