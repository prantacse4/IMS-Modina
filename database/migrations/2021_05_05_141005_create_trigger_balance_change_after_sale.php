<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerBalanceChangeAfterSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `balanceChangeDealer` AFTER INSERT ON `save_sale_records`
        FOR EACH ROW update balance_dealers
        set balance=balance+NEW.total_amount
        where dealer_id=NEW.dealer
        '); 
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_after_main_insert`');
    }
}
