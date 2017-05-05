<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class PZCoreModel extends Model
{
    use SoftDeletes;
    public $incrementing = false;
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)$model->generateNewId(); // getKeyName - Model aprasyta f-ja
        });
    }

    /**
     * Generates new id
     * @return mixed
     */
    public function generateNewId()
    {
        if (isset($this->attributes['id'])) { //attributes - key sinonimas, isset - is set (ar nustatyta)
            return $this->attributes['id'];
        }

        return Uuid::uuid4();
    }
}
