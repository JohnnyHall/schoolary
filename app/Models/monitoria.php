<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'monitoria_name',
        'monitoria_file_path',
        'class_id',
        'course_id',
        'session_id'
    ];
}
