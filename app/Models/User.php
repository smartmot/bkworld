<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'name',
        'email',
        "birth_date",
        "photo",
        "gender",
        'email_verified_at',
        'password',
        'token',
        'status',
        'options',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function creater(){
        return $this->belongsTo(User::class, "created_by");
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }



}
