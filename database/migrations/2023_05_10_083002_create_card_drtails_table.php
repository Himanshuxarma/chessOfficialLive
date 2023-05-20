<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDrtailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_drtails', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('order_id');
            $table->string('name');
            $table->string('card_number');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('cvv');
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
        Schema::dropIfExists('card_drtails');
    }
}
