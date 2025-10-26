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
    Schema::create('imovels', function (Blueprint $table) {
        $table->id();
        
        $table->string('titulo');
        $table->text('descricao');

        $table->text('endereco');
        $table->enum('categoria', ['Apartamento','Casa','Terreno','Chácara']);
        $table->enum('tipo', ['Venda', 'Aluguel']);
        $table->decimal('preco', 10, 2);
        $table->integer('quartos');
        $table->integer('banheiros');
        $table->integer('area');

        $table->string('imagem_principal')->nullable();
        $table->json('galeria_imagens')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imovels');
    }
};
