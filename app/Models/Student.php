<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "student_information";
    protected $fillable = [
        'user_id',
        'image',
        'file',
        'address', '
        current_depertment',
        'current_class',
        'current_school'
    ];
}
