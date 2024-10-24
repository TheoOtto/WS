<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model// define o que vai no banco
{
    protected $table = 'areas';
    protected $primaryKey = 'id';
    protected $fillable = ['area_nome'];

    use HasFactory;
}
