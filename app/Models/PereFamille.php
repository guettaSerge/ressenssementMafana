<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PereFamille extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perefamille';

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
    protected $fillable = ['id', 'idpersonne', 'dateAdmission', 'idDomicile', 'idProfession', 'idTranobe'];
    public $timestamps = false;

}
