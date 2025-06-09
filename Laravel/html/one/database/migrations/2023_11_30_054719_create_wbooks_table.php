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
        Schema::create('wbooks', function (Blueprint $table) {
             $table->id();
			$table->string('name',50)->nullable();
			$table->integer('price')->nullable();
			$table->string('author')->nullable();
			$table->string('exp',255)->nullable();
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
        Schema::dropIfExists('wbooks');
    }
};
