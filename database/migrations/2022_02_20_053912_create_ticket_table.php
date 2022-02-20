<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->text('user_name')->nullable();
            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->integer('number_phone')->nullable();
            $table->text('departure_date')->nullable();
            $table->text('return_date')->nullable();
            $table->integer('amount_adults')->nullable();
            $table->integer('amount_children_less_12')->nullable();
            $table->integer('amount_children_less_2')->nullable();
            $table->integer('package')->nullable();
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
        Schema::dropIfExists('ticket');
    }
};
