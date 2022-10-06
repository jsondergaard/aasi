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
		Schema::create('sponsor_kickbacks', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('sponsor_id');
			$table->unsignedBigInteger('sponsor_offer_id');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('sponsor_id')->references('id')->on('sponsors');
			$table->foreign('sponsor_offer_id')->references('id')->on('sponsor_offers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sponsor_kickbacks');
	}
};
