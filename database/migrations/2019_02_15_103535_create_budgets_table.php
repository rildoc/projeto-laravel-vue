<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa')->nullable();
            $table->string('nome')->nullable();
            $table->date('data')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('cep')->nullable();
            $table->string('mensagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
