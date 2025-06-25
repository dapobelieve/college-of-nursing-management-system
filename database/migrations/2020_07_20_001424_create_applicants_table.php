<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mysql2')->dropIfExists('applicants');
        Schema::connection('mysql2')->create('applicants', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->enum('sex', ['MALE', 'FEMALE']);
            $table->string('phone', 11)->unique();
            $table->dateTime('dob')->nullable();
            $table->string('state');
            $table->string('lga');
            $table->string('pic_url')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('position');
            $table->enum('emp_type', ['FULL-TIME', 'PART-TIME']);
            $table->enum('drug_test', ['YES', 'NO']);
            $table->rememberToken();
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
        Schema::connection('mysql2')->dropIfExists('applicants');
    }
}
