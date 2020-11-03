<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;
    use SoftDeletes;

    public $table = 'users';


    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom', 'nom', 'email', 'password', 'fonction', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'fonction' => 'required',
        'role_id' => 'required'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'email' => 'string',
        'password' => 'string',
        'fonction' => 'string'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating( function ($model)
        {
            $model->user_created = Auth::user()->id ?? null;
            $model->user_modified = Auth::user()->id ?? null;

        });

        static::updating( function ($model)
        {
            $model->user_modified = Auth::user()->id ?? null;
        });
    }

    public  function Demandes () {
        return $this->hasOne('App\Models\Demande');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public  function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasAnyRoles (array $roles) {
        if ($this->roles()->whereIn('nom_role', $roles)->first()) {
            return true;
        }
        return  false;
    }

    public function hasRole ($role) {
        if ($this->roles()->where('nom_role', $role)->first()) {
            return true;
        }
        return  false;
    }

    /*
    public function profil () {
        return $this->hasOne('App\Models\Profil');
    }
    */

}
