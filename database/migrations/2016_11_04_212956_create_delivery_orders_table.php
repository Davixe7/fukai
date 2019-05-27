<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code',40);
            $table->string('full_address');
            $table->string('customer_comments');
            $table->string('operator_comments');
            $table->time('delivery_time');
            $table->integer('cash');
            $table->string('stage',100);
            $table->integer('store_order_id')->unsigned();
            $table->integer('delivery_operator')->unsigned();
            $table->timestamps();
            $table->foreign('store_order_id')
                ->references('id')->on('store_orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('delivery_operator')
                ->references('id')->on('delivery_operators')
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
        Schema::drop('delivery_orders');
    }
}
