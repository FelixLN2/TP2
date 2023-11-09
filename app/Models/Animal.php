<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','genus_id','image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function genus(){
        return $this->belongsTo(Genus::class);
    }
}
