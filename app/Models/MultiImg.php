<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;
   protected $fillable=[
        'travel_id', 'image'
    ];

    protected $hidden = [

    ];

    public function travel(){
        return $this->belongsTo(Travel::class,'travel_id', 'id');
    }
}
