<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailedRequestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('failed_requests', function (Blueprint $table) {
			$table->increments('id');
			$table->string('status')->nullable()->default(null);
			$table->string('code')->nullable()->default(null);
			$table->text('message')->nullable()->default(null);
			$table->string('category')->nullable()->default(null)->index();
			$table->string('country')->nullable()->default(null)->index();
			$table->text('source_url')->nullable()->default(null);
			$table->string('domain')->nullable()->default(null)->index();
			$table->string('api')->nullable()->default(null);
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
		Schema::dropIfExists('failed_requests');
	}
}
