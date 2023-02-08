<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $with = ['account'];
    function account(){
        return $this->belongsTo(Order::class);
    }
}
