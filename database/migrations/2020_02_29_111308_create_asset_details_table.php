<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asset_id');
            $table->string('serial_number')->unique();
            $table->text('specs')->nullable();
            $table->text('os')->nullable();
            $table->string('platform')->nullable();
            $table->string('license')->nullable();
            $table->integer('no_of_users')->nullable();
            $table->date('purchase_date');
            $table->date('warranty_date');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->timestamps();

            //define status forein key
            $table->foreign('status_id')
            ->references('id')
            ->on('asset_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            //define asset forengn key
            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
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
        Schema::dropIfExists('asset_details');
    }
}
