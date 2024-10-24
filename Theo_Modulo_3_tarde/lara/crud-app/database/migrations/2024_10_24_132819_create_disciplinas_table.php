<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void//define o banco
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('disciplina_nome');
            $table->string('disciplina_turma');
            $table->string('disciplina_professor');
            $table->string('disciplina_aulas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
