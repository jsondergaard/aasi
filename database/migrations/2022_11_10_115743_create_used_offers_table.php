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
		Schema::create('used_offers', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('sponsor_id');
			$table->unsignedBigInteger('offer_id');
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
		Schema::dropIfExists('used_offers');
	}
};
