<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZOrderIngredientsConnection extends Model
{
    public $updated_at = false;
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_order_ingredient_connection';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['order_id', 'ingredient_id'];

    public function IngredientsData()
    {
        return $this->hasOne(PZIngredients::class, 'id', 'ingredient_id');
    }
}
