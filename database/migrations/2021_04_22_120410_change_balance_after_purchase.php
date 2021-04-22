<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeBalanceAfterPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `balanceChangeAfterPurchase` AFTER INSERT ON `save_purchase_records`
        FOR EACH ROW update balance_dues
        set balance=balance-NEW.total_amount
        where com_id=NEW.company
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
