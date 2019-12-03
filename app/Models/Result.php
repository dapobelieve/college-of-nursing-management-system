<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Result extends Model
{
  protected $fillable = [
      'exam_type', 'exam_no', 'student_id', 'mathematics', 'english', 'physics', 'biology', 'chemistry'
  ];


  public function student()
  {
      return $this->belongsTo(Student::class);
  }
}
