<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('reaction_rate')->default(10);
            $table->integer('comment_rate')->default(30);
            $table->integer('share_rate')->default(50);
            $table->tinyInteger('time')->default(1);
            $table->string('time_type')->default('month');
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
        Schema::dropIfExists('exchange_configs');
    }
}
