<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //define o banco
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('aluno_nome');
            $table->string('aluno_turma');
            $table->string('aluno_email');
            $table->string('aluno_telefone');
            $table->string('aluno_senha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
