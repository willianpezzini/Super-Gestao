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
        //cria a tabela filiais.
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 50);
            $table->timestamps();
        });

        //cria a tabela produto_filiais.
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 10, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //adiciona os constraints
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

        });

        //remove colunas da tabela produtos.
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('preco_venda', 'estoque_minimo', 'estoque_maximo');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //adiciona colunas da tabela produtos.
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 10, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        //esclui as tabelas caso elas existam.
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
