<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAdminUserConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->integer('user_id', false, true);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['userable_id', 'userable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userable_id');
            $table->string('userable_type');
        });
    }
}
