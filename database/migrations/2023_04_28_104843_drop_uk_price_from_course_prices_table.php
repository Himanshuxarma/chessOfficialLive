<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUkPriceFromCoursePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_prices', function (Blueprint $table) {
            $table->dropColumn('uk_price');
            $table->dropColumn('canada_price');
            $table->dropColumn('uae_price');
            $table->dropColumn('singapore_price');
            $table->dropColumn('us_price');
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
