<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cotisations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nom'];
    public $timestamps = false;

}
