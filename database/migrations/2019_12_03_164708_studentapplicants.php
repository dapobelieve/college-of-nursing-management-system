<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Studentapplicants extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('studentapplicants', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->integer('Cardapplicant_id')->unsigned();
        $table->string('first_name');
        $table->string('middle_name');
        $table->string('surname');
        $table->enum('gender', ['MALE', 'FEMALE']);
        $table->enum('marital_status', ['SINGLE', 'MARRIED', 'DIVORCED']);
        $table->string('phone', 11)->unique();
        $table->string('email')->unique();
        $table->string('lga');
        $table->string('state_of_origin');
        $table->dateTime('dob');
        $table->enum('religion', ['Christianity', 'Islam']);
        $table->string('home_address');
        $table->string('state');
        $table->string('pic_url')->nullable();
        $table->string('sponsor_type')->nullable();
        $table->string('sponsor_name')->nullable();
        $table->string('sponsor_phone',11)->nullable();
        $table->string('sponsor_email')->nullable();
        $table->string('sponsor_add')->nullable();
        $table->enum('exam_type', ['WAEC', 'NECO', 'GCE'])->nullable();
        $table->string('exam_no')->nullable();
        $table->enum('mathematics', ['A1','B2','B3','C4','C5','C6','AR'])->default('AR');
        $table->enum('english', ['A1','B2','B3','C4','C5','C6','AR'])->default('AR');
        $table->enum('physics', ['A1','B2','B3','C4','C5','C6','AR'])->default('AR');
        $table->enum('chemistry', ['A1','B2','B3','C4','C5','C6','AR'])->default('AR');
        $table->enum('biology', ['A1','B2','B3','C4','C5','C6','AR'])->default('AR');
        $table->string('reg_step');
        $table->string('score')->nullable();
        $table->enum('Admssion_status',['NO', 'YES'])->default('NO');
        $table->foreign('Cardapplicant_id')->references('id')->on('cardapplicants')->onDelete('CASCADE');
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
      Schema::dropIfExists('studentapplicants');
  }
}
