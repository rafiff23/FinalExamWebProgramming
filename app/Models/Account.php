<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'account';
    protected $primaryKey = 'account_id';
    protected $guarded = ['id'];
    protected $with = ['role','gender'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'display_picture_link',
        'password',
        'role_id',
        'gender_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function username()
    {
        return 'email';
    }
    // relation
    
    function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    function gender(){
        return $this->belongsTo(Gender::class,'gender_id');
    }
    function order(){
        return $this->hasMany(Order::class);
    }
}
