<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZCheese extends PZCoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_cheese';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'calories'];
}
