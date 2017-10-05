<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasOne('App\Post');
        //hasOne (RELATEDMODEL, FOREIGNKEY);
        //RELATEDMODEL adalah model yang ingin direlasikan dengan User, yaitu Post
        //Secara default FOREIGNKEY adalah MODELNAME_id
        //Dalam kasus ini user_id
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        //To customize table name and columns follow the format below
        //return $this->belongsToMany('App\Role', 'user_roles', 'user_id', ...);
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function getNameAttribute($value){
        //Format nama function --> get + NAMAKOLOM + Attribute
        //Kita akan mengakses kolom "nama" dari tabel users
        //Sehingga NAMAKOLOM = nama (Diawali dengan huruf besar)

        return strtoupper($value);
    }

    public function setNameAttribute($value){
        //Format nama function --> set + NAMAKOLOM + Attribute
        //Kita akan mengakses kolom "nama" dari tabel users
        //Sehingga NAMAKOLOM = nama (Diawali dengan huruf besar)

        $this->attributes['name'] = strtoupper($value);
    }
}