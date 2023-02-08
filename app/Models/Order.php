<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $with = ['account'];
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $guard = ['order_id'];
    protected $fillable = [
        'account_id',
        'price'
    ];
    function account(){
        return $this->belongsTo(Account::class,'account_id');
    }
}
