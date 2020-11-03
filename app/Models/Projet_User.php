<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Projet_User
 * @package App\Models
 * @version August 25, 2020, 7:12 pm UTC
 *
 * @property integer $user_id
 * @property integer $projet_id
 */
class Projet_User extends Model
{
    use SoftDeletes;

    public $table = 'projet_users';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'projet_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'projet_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'projet_id' => 'required'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating( function ($model)
        {
            $model->user_created = Auth::user()->id ?? null;
            $model->user_modified = Auth::user()->id ?? null;
            print($model);
        });

        static::updating( function ($model)
        {
            $model->user_modified = Auth::user()->id ?? null;
        });
    }

    public function Demandes () {
        return $this->belongsTo('App\Models\Demande');
    }

}
