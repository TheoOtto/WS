<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model// define o que vai no banco
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = ['curso_nome', 'curso_area'];

    use HasFactory;
}
