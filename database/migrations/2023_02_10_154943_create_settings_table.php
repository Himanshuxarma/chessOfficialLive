<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('front_logo');
            $table->string('back_logo');
            $table->string('profile_picture');
            $table->string('last_login');
            $table->string('facebook_link');
            $table->string('instagram_link');
            $table->string('google_link');
            $table->string('linkedin_link');
            $table->string('pinterest_link');
            $table->string('snapchat_link');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('settings');
    }
}