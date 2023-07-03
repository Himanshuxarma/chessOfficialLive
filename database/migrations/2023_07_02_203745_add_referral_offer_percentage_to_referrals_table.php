<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferralOfferPercentageToReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn('offer_percentage');
            $table->dropColumn('is_applied');
            $table->dropColumn('is_used');
            $table->integer('referrer_offer_percentage')->nullable()->after('new_user_id');
            $table->integer('referee_offer_percentage')->nullable()->after('referrer_offer_percentage');
            $table->tinyInteger('is_referrer_used')->nullable()->after('referee_offer_percentage');
            $table->tinyInteger('is_referee_used')->nullable()->after('is_referrer_used');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referrals', function (Blueprint $table) {
            //
        });
    }
}
