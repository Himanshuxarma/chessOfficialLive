<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCountryTimezoneTableToCountryTimezones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('country_timezones', function (Blueprint $table) {
            Schema::rename('country_timezone', 'country_timezones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('country_timezones', function (Blueprint $table) {
            //
        });
    }
}
