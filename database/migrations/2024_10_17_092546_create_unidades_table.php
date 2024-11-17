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
        Schema::create('unidade', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();

        });

        // Adiciona o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
             $table->foreign('unidade_id')->references('id')->on('unidade');
        });

        // Adiciona o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
             $table->foreign('unidade_id')->references('id')->on('unidade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Adiciona o relacionamento com a tabela produto_detalhe
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        // Adiciona o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidade');
    }
};
