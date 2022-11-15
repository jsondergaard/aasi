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
		Schema::create('offers', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('description');
			$table->unsignedBigInteger('sponsor_id');
			$table->unsignedBigInteger('cooldown')->nullable();
			$table->timestamps();

			$table->foreign('sponsor_id')->references('id')->on('sponsors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('offers');
	}
};
