<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUkPriceToCoursePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_prices', function (Blueprint $table) {
            $table->string('uk_price')->after('course_id');
            $table->string('canada_price')->after('uk_price');
            $table->string('uae_price')->after('canada_price');
            $table->string('singapore_price')->after('uae_price');
            $table->string('us_price')->after('singapore_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_prices', function (Blueprint $table) {
            //
        });
    }
}
