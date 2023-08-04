<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id');
            $table->string('ref_no');
            $table->bigInteger('user_id');
            $table->bigInteger('source_id');
            $table->decimal('amount',20,2);
            $table->text('description')->nullable();
            $table->tinyInteger('type')->comment('1 => income, 2 => expense');
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
        Schema::dropIfExists('transactions');
    }
}
