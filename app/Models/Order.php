<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'reference',
        'trx_ref',
        
    ];

public function users(){
    $this->belongsTo(User::class);
}
}