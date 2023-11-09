<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function animal(){
        return $this->hasMany(Animal::class);
    }
}


