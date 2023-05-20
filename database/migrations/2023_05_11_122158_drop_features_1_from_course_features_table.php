<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFeatures1FromCourseFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_features', function (Blueprint $table) {
            $table->dropColumn('features_1');
            $table->dropColumn('features_2');
            $table->dropColumn('features_3');
            $table->dropColumn('features_4');
            $table->dropColumn('features_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_features', function (Blueprint $table) {
            //
        });
    }
}
