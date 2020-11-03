<?php

namespace App\Models;

use Eloquent as Model;
use Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Demande
 * @package App\Models
 * @version September 2, 2020, 10:04 pm UTC
 *
 * @property string $objet
 * @property integer $departement_id
 * @property integer $projet_user_id
 * @property string $message
 * @property integer $niveau_importance_id
 * @property integer $type_demande_id
 * @property string $statut
 * @property integer $responsable
 * @property string|\Carbon\Carbon $date_fermeture
 */
class Demande extends Model
{
    use SoftDeletes;


    public $table = 'demandes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'objet',
        'departement_id',
        'projet_user_id',
        'message',
        'niveau_importance_id',
        'type_demande_id',
        'statut',
        'responsable',
        'date_fermeture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'objet' => 'string',
        'departement_id' => 'integer',
        'projet_user_id' => 'integer',
        'message' => 'string',
        'niveau_importance_id' => 'integer',
        'type_demande_id' => 'integer',
        'statut' => 'string',
        'responsable' => 'integer',
        'date_fermeture' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'objet' => 'required',
        'departement_id' => 'required',
        'projet_user_id' => 'required',
        'message' => 'required',
        'niveau_importance_id' => 'required',
        'type_demande_id' => 'required',
        'statut' => 'required',
        'date_fermeture' => 'required'
    ];

    public  function Departements () {
        return $this->hasOne('App\Models\Departement');
    }

    public  function Projet_Users () {
        return $this->hasOne('App\Models\Projet_User');
    }

    public  function Niveau_Importances () {
        return $this->hasOne('App\Models\Niveau_Importance');
    }

    public  function Type_Demandes () {
        return $this->hasOne('App\Models\Type_Demande');
    }

    public  function Projets () {
        return $this->hasOne('App\Models\Projet');
    }

    public  function Contrats () {
        return $this->hasOne('App\Models\Contrat');
    }

    public  function Users () {
        return $this->hasOne('App\Models\User');
    }

}
