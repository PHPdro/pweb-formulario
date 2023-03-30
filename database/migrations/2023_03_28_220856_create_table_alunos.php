<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aluno');
            $table->date('nascimento');
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('ddd');
            $table->string('telefone');
            $table->string('email');
            // $table->string('serie');
            // $table->string('turno');
            //$table->timestamps();
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
