<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZOrders extends PZCoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_orders';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'phone', 'address', 'base_id'];
}
