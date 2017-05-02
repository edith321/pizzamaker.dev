<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZBase extends PZCoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_base';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'calories'];
}
