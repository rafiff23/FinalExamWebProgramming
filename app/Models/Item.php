<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $with = ['account'];
    protected $guard = ['id'];
    protected $fillable = [
        'item_name',
        'price',
        'item_desc',
        'image_link'
    ];
    function account(){
        return $this->belongsTo(Order::class);
    }

}
