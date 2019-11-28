<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->text('rich_content');
=======
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('details')->nullable();
>>>>>>> f0431a6eb839c2872426828a3d3824f647bc3bd3
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
        Schema::dropIfExists('news');
    }
}
