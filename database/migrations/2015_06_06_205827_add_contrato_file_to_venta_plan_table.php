<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContratoFileToVentaPlanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ventas_planes', function(Blueprint $table)
		{
			$table->string('contrato_file')->after('observaciones')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ventas_planes', function(Blueprint $table)
		{
			$table->dropColumn('contrato_file');
		});
	}

}
