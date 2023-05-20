<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCountryNullableOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->unsigned()->nullable()->change();
            $table->string('state')->unsigned()->nullable()->change();
            $table->string('city')->unsigned()->nullable()->change();
            $table->string('address')->unsigned()->nullable()->change();
            $table->string('dob')->unsigned()->nullable()->change();
            $table->string('user_image')->unsigned()->nullable()->change();
            $table->string('is_verified')->unsigned()->nullable()->change();
            $table->string('verification_code')->unsigned()->nullable()->change();
            $table->string('password')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
