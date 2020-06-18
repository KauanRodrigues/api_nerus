<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('produtos'))
        {
            Schema::create('produtos', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 150);
                $table->string('categoria', 50);
                $table->string('descricao', 150);
                $table->decimal('preco', 8, 2);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}