<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model// define o que vai no banco
{
    protected $table = 'disciplinas';
    protected $primaryKey = 'id';
    protected $fillable = ['disciplina_nome', 'disciplina_turma', 'disciplina_professor', 'disciplina_aulas'];

    use HasFactory;
}
