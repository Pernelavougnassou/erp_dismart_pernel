<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Type_Demande
 * @package App\Models
 * @version September 2, 2020, 9:49 pm UTC
 *
 * @property string $type
 */
class Type_Demande extends Model
{
    use SoftDeletes;

    public $table = 'type__demandes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|unique:type__demandes'
    ];

    public function Demandes () {
        return $this->belongsTo('App\Models\Demande');
    }

}
