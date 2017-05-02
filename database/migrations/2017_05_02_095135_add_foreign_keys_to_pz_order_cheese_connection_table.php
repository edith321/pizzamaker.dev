<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzOrderCheeseConnectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_order_cheese_connection', function(Blueprint $table)
		{
			$table->foreign('cheese_id', 'fk_pz_order_cheese_connection_pz_cheese1')->references('id')->on('pz_cheese')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('order_id', 'fk_pz_order_cheese_connection_pz_order')->references('id')->on('pz_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_order_cheese_connection', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_order_cheese_connection_pz_cheese1');
			$table->dropForeign('fk_pz_order_cheese_connection_pz_order');
		});
	}

}
