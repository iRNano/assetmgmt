<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asset_detail_id');
            $table->unsignedBigInteger('transaction_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('asset_detail_id')
            ->references('asset_id')
            ->on('asset_details')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('transaction_id')
            ->references('id')
            ->on('transactions')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets_transactions');
    }
}
