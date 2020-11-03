<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contrat
 * @package App\Models
 * @version September 3, 2020, 9:53 pm UTC
 *
 * @property integer $projet_user_id
 * @property integer $planmaintenance_id
 * @property string $description
 * @property string|\Carbon\Carbon $date_debut
 * @property string|\Carbon\Carbon $date_fin
 * @property string $statut
 */
class Contrat extends Model
{
    use SoftDeletes;

    public $table = 'contrats';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'projet_user_id',
        'planmaintenance_id',
        'description',
        'date_debut',
        'date_fin',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'projet_user_id' => 'integer',
        'planmaintenance_id' => 'integer',
        'description' => 'string',
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'statut' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'projet_user_id' => 'required',
        'planmaintenance_id' => 'required',
        'date_debut' => 'required',
        'date_fin' => 'required',
        'statut' => 'required'
    ];

    public  function Demandes () {
        return $this->hasOne('App\Models\Demande');
    }

}
