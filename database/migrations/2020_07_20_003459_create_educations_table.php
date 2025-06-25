<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->dropIfExists('educations');
        Schema::connection('mysql2')->create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants');
            $table->string('schoolname');
            $table->string('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('certified');
            $table->string('major');
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
        Schema::connection('mysql2')->dropIfExists('educations');
    }
}
