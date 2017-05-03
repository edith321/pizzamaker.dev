<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZOrders extends PZCoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_order';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'phone', 'address', 'base_id', 'comments'];
    /**
     * Returns cheese data
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function orderCheeseConnection()
    {
        return $this->belongsToMany(PZOrderCheeseConnection::class, 'pz_order_cheese_connection', 'order_id', 'cheese_id');
    }

    /**
     * Returns ingredient data
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */

    public function orderIngredientConnection()
    {
        return $this->belongsToMany(PZOrderIngredientsConnection::class, 'pz_order_ingredient_connection', 'order_id', 'ingredient_id');
    }


    public function orderCheeseConnectionData()
    {
        return $this->hasMany(PZOrderCheeseConnection::class, 'order_id', 'id')->with(['cheeseData']);
    }
}
