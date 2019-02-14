<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable;
            $table->text('name')->nullable;
            $table->text('description')->nullable;
            $table->string('copyright', 255)->nullable;
            $table->text('keywords')->nullable;
            $table->string('logo')->nullable;
            $table->string('foneA', 100)->nullable;
            $table->string('foneB', 100)->nullable;
            $table->text('localizacao')->nullable;
            $table->string('desc_pagamento', 250)->nullable;
            $table->string('imagem_pagamento')->nullable;
            $table->string('cor_title')->nullable;
            $table->string('cor_background')->nullable;
            $table->string('cor_texto')->nullable;
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
        Schema::dropIfExists('cms');
    }
}
