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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('transNo')->unique();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('status_id'); //Transaction status ID
            $table->timestamps();

            //define foreign key
            $table->foreign('profile_id')
            ->references('id')
            ->on('profiles')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('status_id')
            ->references('id')
            ->on('transaction_statuses')
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
        Schema::dropIfExists('transactions');
    }
}
