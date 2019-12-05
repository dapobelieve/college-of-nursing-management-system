<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cardapplicants extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cardapplicants', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('reg_no')->unique();
        $table->string('password');
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
      Schema::dropIfExists('cardapplicants');
  }
}
