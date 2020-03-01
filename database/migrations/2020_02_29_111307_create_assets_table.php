<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->text('os')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->text('specs')->nullable();
            $table->string('platform')->nullable();
            $table->string('license')->nullable();
            $table->integer('no_of_users')->nullable();
            $table->string('serial_number')->unique();
            $table->date('purchase_date');
            $table->date('warranty_date');
            $table->boolean('isActive')->default(true);
            $table->unsignedBigInteger('status_id');
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
        Schema::dropIfExists('assets');
    }
}
