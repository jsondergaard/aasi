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
		Schema::create('pages', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('content')->nullable();
			$table->string('slug')->unique();
			$table->unsignedBigInteger('parent_id')->nullable();
			$table->unsignedBigInteger('author_id');
			$table->boolean('is_page')->default(1);
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
		Schema::dropIfExists('pages');
	}
};
