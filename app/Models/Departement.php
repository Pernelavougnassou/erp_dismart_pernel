<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departement
 * @package App\Models
 * @version September 3, 2020, 12:45 am UTC
 *
 * @property string $nom_departement
 */
class Departement extends Model
{
    use SoftDeletes;

    public $table = 'departements';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_departement'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_departement' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_departement' => 'required|unique:departements'
    ];

    public function Demandes () {
        return $this->belongsTo('App\Models\Demande');
    }

}
