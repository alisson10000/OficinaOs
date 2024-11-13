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
        Schema::create('ordens_servico', function (Blueprint $table) {
            $table->id(); // chave primária
            $table->string('cliente'); // Nome do cliente
            $table->string('veiculo'); // Veículo do cliente
            $table->string('status')->default('Pendente'); // Status da ordem de serviço, com valor padrão "Pendente"
            $table->date('data_criacao'); // Data de criação da ordem
            $table->timestamps(); // Colunas created_at e updated_at, que são criadas automaticamente pelo Laravel
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens_servico');
    }
};
