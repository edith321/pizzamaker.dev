<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZIngredients extends PZCoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_ingredients';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'calories'];
}
