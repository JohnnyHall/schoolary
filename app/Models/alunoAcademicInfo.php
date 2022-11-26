<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alunoAcademicInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id',
        'board_reg_no',
    ];

    /**
     * Get the sections for the blog post.
     */
    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }
}
