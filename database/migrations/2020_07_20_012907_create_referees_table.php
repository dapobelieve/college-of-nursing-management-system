<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefereesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mysql2')->dropIfExists('referees');
        Schema::connection('mysql2')->create('referees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants');
            $table->string('name');
            $table->string('position');
            $table->string('company');
            $table->string('address')->nullable();
            $table->string('phone', 11);
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
        Schema::connection('mysql2')->dropIfExists('referees');
    }
}
