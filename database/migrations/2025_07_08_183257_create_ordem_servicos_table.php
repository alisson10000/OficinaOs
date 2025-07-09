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
            $table->id();

            // 🔗 Chave estrangeira para clientes
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            // 🛠️ Campos típicos de oficina
            $table->date('data_entrada');
            $table->date('data_saida')->nullable();
            $table->string('status')->default('Em andamento'); // Ex: Em andamento, Concluído, Cancelado
            $table->text('descricao_servico');
            $table->decimal('valor_total', 10, 2)->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_servicos');
    }
};
