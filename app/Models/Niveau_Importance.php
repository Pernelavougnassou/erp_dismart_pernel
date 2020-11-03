<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Niveau_Importance
 * @package App\Models
 * @version September 2, 2020, 9:44 pm UTC
 *
 * @property string $niveau
 */
class Niveau_Importance extends Model
{
    use SoftDeletes;

    public $table = 'niveau__importances';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'niveau'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'niveau' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'niveau' => 'required|unique:niveau__importances'
    ];

    public function Demandes () {
        return $this->belongsTo('App\Models\Demande');
    }

}
