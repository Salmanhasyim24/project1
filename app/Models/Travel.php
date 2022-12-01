<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','slug','location','about','featured_event',
        'language','foods','departure_date','duration','type',
        'price'
    ];

    protected $hidden = [

    ];

     
    public function MultiImgs(){
        return $this->hasMany(MultiImg::class,'travel_id', 'id');
    }
}
