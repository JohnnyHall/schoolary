<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alunoParentInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'parent_address',
    ];

    /**
     * Get the sections for the blog post.
     */
    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }
}
