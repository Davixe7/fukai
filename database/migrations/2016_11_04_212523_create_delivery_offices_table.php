<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_offices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',40);
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('service_hours');
            $table->integer('delivery_town_id')->unsigned();
            $table->timestamps();
            $table->foreign('delivery_town_id')
                ->references('id')->on('delivery_towns')
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
        Schema::drop('delivery_offices');
    }
}
