<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
       protected $fillable=[
        'travel_id', 'users_id', 'additional_visa',
        'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

   public function details(){
       return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
   }
   public function travel(){
       return $this->belongsTo(Travel::class, 'travel_id', 'id');
   }
   public function user(){
    return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
