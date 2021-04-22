<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveSaleRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_sale_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('company');
            $table->unsignedBigInteger('dealer');
            $table->unsignedBigInteger('showroom');
            $table->double('total_amount');
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
        Schema::dropIfExists('save_sale_records');
    }
}
