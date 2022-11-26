<?php

namespace App\Models;

use App\Models\Mark;
use App\Models\alunoAcademicInfo;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primeiro_nome',
        'sobrenome',
        'email',
        'password',
        'gender',
        'nationality',
        'phone',
        'address',
        'city',
        'zip',
        'photo',
        'Aniversario',
        'lista_filmes',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the academic_info.
     */
    public function academic_info()
    {
        return $this->hasOne(alunoAcademicInfo::class, 'aluno_id', 'id');
    }

    /**
     * Get the marks.
     */
    public function marks()
    {
        return $this->hasMany(Mark::class, 'aluno_id', 'id');
    }
}
