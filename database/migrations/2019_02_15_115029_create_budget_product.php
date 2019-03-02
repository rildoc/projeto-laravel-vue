<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_product', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('budget_id')->unsigned();

            $table->foreign('product_id')
                            ->references('id')
                            ->on('products')
                            ->onDelete('cascade');

            $table->foreign('budget_id')
                            ->references('id')
                            ->on('budgets')
                            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_product');
    }
}
