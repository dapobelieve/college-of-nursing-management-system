<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paymentapplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paymentapplicants', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('studentapplicant_id')->unsigned();
          $table->foreign('studentapplicant_id')->references('id')->on('studentapplicants');
          $table->integer('payment_modes_id')->unsigned();
          $table->foreign('payment_modes_id')->references('id')->on('payment_modes');
          $table->string('reference');
          $table->decimal('amount', 8, 2);
          $table->enum('status', ['PAID', 'NOT PAID'])->default('NOT PAID');
          $table->softDeletes();
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
        Schema::dropIfExists('paymentapplicants');
    }
}
