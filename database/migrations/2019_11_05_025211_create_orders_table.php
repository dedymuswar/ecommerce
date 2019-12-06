<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('billing_name');
            $table->string('provinces_id');
            $table->string('cities_id');
            $table->text('billing_address');
            $table->string('billing_discount_code');
            $table->integer('billing_discount')->default(0);
            $table->string('billing_subtotal');
            $table->integer('billing_ongkir');
            $table->string('billing_total');
            $table->string('error')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
