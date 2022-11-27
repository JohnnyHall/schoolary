<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'marks',
        'aluno_id',
        'class_id',
        'section_id',
        'course_id',
        'exam_id',
        'session_id'
    ];

    /**
     * Get the aluno for attendances.
     */
    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }

    /**
     * Get the schoolClass.
     */
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the section.
     */
    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Get the course.
     */
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the exam.
     */
    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
