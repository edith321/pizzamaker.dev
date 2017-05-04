<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PZOrderCheeseConnection extends Model
{
     public $updated_at = false;
    protected $hidden = ['created_at', 'id'];
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_order_cheese_connection';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['order_id', 'cheese_id'];

    public function cheeseData()
    {
        return $this->hasOne(PZCheese::class, 'id', 'cheese_id');
    }
}
