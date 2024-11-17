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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            // colunas
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 10, 2);
            $table->float('largura', 10, 2);
            $table->float('altura', 10, 2);
            $table->timestamps();

            // constraint, aqui se faz a referencia e indicação de relacionamento entre tabelas, ou seja, que uma tabela vai receber informações de outra.
            $table->foreign('produto_id')->references('id')->on('produtos');
            // O unique garante a relação de 1/1, ou seja, que o produto id tenha apenas um valor.
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
