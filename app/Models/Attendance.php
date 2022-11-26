<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id',
        'class_id',
        'section_id',
        'session_id',
        'course_id',
        'status',
    ];

    /**
     * Get the aluno for attendances.
     */
    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }

    /**
     * Get the schoolClass for attendance.
     */
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the section for attendance.
     */
    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Get the course for attendance.
     */
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
