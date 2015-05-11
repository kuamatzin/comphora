<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivoToCostoAgregadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('costo_agregado', function(Blueprint $table)
		{
			$table->integer('activo')->default(0);
			$table->integer('status')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('costo_agregado', function(Blueprint $table)
		{
			$table->dropColumn('activo');
			$table->dropColumn('status');
		});
	}

}
