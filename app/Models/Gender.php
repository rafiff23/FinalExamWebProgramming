<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $with = ['account'];
    protected $table = 'gender';
    protected $primaryKey = 'gender_id';

    function account(){
        return $this->belongsTo(Account::class);
    }
}
