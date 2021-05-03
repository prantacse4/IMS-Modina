<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerBalanceDealer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `AddToBalanceDealer` AFTER INSERT ON `dealers`
 FOR EACH ROW INSERT INTO balance_dealers(dealer_id, balance, created_at) VALUES(NEW.id, 0, CURRENT_TIMESTAMP)');
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
