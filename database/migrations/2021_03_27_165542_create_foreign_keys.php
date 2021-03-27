<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('drivers', function(Blueprint $table) {
			$table->foreign('trip_id')->references('id')->on('trips')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('drivers', function(Blueprint $table) {
			$table->dropForeign('drivers_trip_id_foreign');
		});
	}
}