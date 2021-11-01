<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Course extends Model
{
    //use HasFactory;
    protected $fillable = ['course_id', 'student_id', 'nilai']; 
 
    public function course(){ 
        return $this->belongsTo(Course::class, 'course_id'); 
    }

    public function student(){ 
        return $this->belongsTo(Student::class, 'student_id'); 
    }
}
