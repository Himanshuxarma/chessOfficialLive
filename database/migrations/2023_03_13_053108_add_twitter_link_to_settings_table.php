<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwitterLinkToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('twitter_link')->after('snapchat_link');
            $table->string('themeforest_link')->after('twitter_link');
            $table->string('projects_done')->after('themeforest_link');
            $table->string('satisfied_clients')->after('projects_done');
            $table->string('country_numbers')->after('satisfied_clients');
            $table->string('employee_counts')->after('country_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
