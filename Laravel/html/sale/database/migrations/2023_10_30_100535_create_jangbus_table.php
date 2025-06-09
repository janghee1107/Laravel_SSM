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
        Schema::create('jangbus', function (Blueprint $table) {
            $table->id();
			$table->tinyinteger('io31')->nullable();
			$table->date('writeday31')->nullable();
			$table->integer('products_id31')->nullable();
			$table->integer('price31')->nullable();
			$table->integer('numi31')->nullable();
			$table->integer('numo31')->nullable();
			$table->integer('prices31')->nullable();
			$table->string('bigo31', 20)->nullable();
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
        Schema::dropIfExists('jangbus');
    }
};
