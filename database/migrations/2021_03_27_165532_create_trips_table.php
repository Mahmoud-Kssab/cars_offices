<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripsTable extends Migration {

	public function up()
	{
		Schema::create('trips', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->decimal('Longitude_from');
			$table->decimal('Longitude_to');
			$table->decimal('latitude_from');
			$table->decimal('latitude_to');
			$table->integer('user_id');
			$table->integer('office_id');
		});
	}

	public function down()
	{
		Schema::drop('trips');
	}
}