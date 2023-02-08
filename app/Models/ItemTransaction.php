<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;

    protected $with = ['item','account'];
    protected $table = 'item_order';
    protected $guard = ['id'];
    protected $fillable = [
        'item_id',
        'account_id',
        'quantity'
    ];

    public function item(){
        return $this->belongsTo(Item::class,'item_id');
    }
    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }

}
