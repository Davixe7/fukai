<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreHistoricalOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_historical_order_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('qty');
            $table->string('name');
            $table->text('description');
            $table->text('extract');
            $table->integer('price');
            $table->integer('price_before');
            $table->string('image');
            $table->tinyInteger('status');
            $table->integer('oder_id')->unsigned();
            $table->timestamps();
            $table->foreign('oder_id')
                ->references('id')->on('store_orders')
                ->onUpdate('cascade')
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
        Schema::drop('store_historical_order_products');
    }
}
