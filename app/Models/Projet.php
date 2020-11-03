<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Projet
 * @package App\Models
 * @version September 4, 2020, 7:59 pm UTC
 *
 * @property string $nom_projet
 * @property string $description
 * @property integer $client_id
 * @property string|\Carbon\Carbon $date_lancement
 * @property string|\Carbon\Carbon $date_livraison
 * @property integer $service_id
 */
class Projet extends Model
{
    use SoftDeletes;

    public $table = 'projets';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_projet',
        'description',
        'client_id',
        'date_lancement',
        'date_livraison',
        'service_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_projet' => 'string',
        'description' => 'string',
        'client_id' => 'integer',
        'date_lancement' => 'date',
        'service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_projet' => 'required',
        'client_id' => 'required',
        'date_lancement' => 'required',
        'service_id' => 'required'
    ];

    public  function Demandes () {
        return $this->hasOne('App\Models\Demande');
    }

}
