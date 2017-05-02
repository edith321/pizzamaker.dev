<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_order', function(Blueprint $table)
		{
			$table->foreign('base_id', 'fk_pz_order_pz_base1')->references('id')->on('pz_base')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_order', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_order_pz_base1');
		});
	}

}
