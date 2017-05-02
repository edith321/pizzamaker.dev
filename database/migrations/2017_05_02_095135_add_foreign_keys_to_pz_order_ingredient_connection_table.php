<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzOrderIngredientConnectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_order_ingredient_connection', function(Blueprint $table)
		{
			$table->foreign('ingredient_id', 'fk_pz_order_ingredient_connection_pz_ingredients1')->references('id')->on('pz_ingredients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('order_id', 'fk_pz_order_ingredient_connection_pz_order1')->references('id')->on('pz_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_order_ingredient_connection', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_order_ingredient_connection_pz_ingredients1');
			$table->dropForeign('fk_pz_order_ingredient_connection_pz_order1');
		});
	}

}
