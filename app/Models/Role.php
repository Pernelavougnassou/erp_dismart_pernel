<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version August 22, 2020, 5:31 pm UTC
 *
 * @property string $nom_role
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_role' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_role' => 'required|unique:roles'
    ];

    public  function users() {
        return $this->belongsToMany('App\Models\User');
    }

}
