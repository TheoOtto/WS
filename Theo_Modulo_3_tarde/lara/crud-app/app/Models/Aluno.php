<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model // define o que vai no banco
{
    protected $table = 'alunos';
    protected $primaryKey = 'id';
    protected $fillable = ['aluno_nome','aluno_turma','aluno_email','aluno_telefone','aluno_senha'];

    use HasFactory;
}
