<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateOfDemoToDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demos', function (Blueprint $table) {
            $table->string('date_of_demo')->after('timezone_id');
            $table->string('time_of_demo')->after('date_of_demo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demos', function (Blueprint $table) {
            //
        });
    }
}
