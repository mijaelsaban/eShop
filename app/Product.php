<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'description', 'imagePath'];


     public function categories()
     {
     	return $this->belongsTo('App\Categorie');
     }
}
