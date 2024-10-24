<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model// define o que vai no banco
{
    protected $table = 'turmas';
    protected $primaryKey = 'id';
    protected $fillable = ['turma_nome', 'turma_curso'];

    use HasFactory;
}
