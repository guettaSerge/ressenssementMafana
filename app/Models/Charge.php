<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'charge';

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
    protected $fillable = ['idPereFamille', 'idPersonne', 'statut'];
    public $timestamps = false;

}
