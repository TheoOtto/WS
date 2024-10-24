<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model// define o que vai no banco
{
    protected $table = 'professores';
    protected $primaryKey = 'id';
    protected $fillable = ['professor_nome', 'professor_email', 'professor_senha'];

    use HasFactory;
}
