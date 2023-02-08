<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';
    protected $fillable = ['name', 'phone', 'email', 'lab_id', 'course_id', 'department_or_staff', 'address', 'visitor_type', 'status'];

}
