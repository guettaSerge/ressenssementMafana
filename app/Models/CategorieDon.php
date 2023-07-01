<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieDon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorie_dons';

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
