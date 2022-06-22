<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsHasMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_has_medicines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');

            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicines');
            
            $table->bigInteger('quantity');
            $table->double('price');

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
        Schema::table('transactions_has_medicines', function (Blueprint $table) {
            $table->dropForeign(['medicine_id']); // First, drop the foreign key; the associated column will still be there as a normal column.
            $table->dropForeign(['transaction_id']); // First, drop the foreign key; the associated column will still be there as a normal column.
        });
        Schema::dropIfExists('transactions_has_medicines');
    }
}
