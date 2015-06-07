<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVentasPlanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ventas_planes', function(Blueprint $table)
		{
			$table->integer('status')->after('user_id');
			$table->integer('contrato')->after('status');
			$table->text('observaciones')->after('contrato')->nullable();
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
			$table->dropColumn('status');
			$table->dropColumn('contrato');
			$table->dropColumn('observaciones');
		});
	}

}
