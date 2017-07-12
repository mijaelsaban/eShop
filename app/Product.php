<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'description', 'imagePath', 'categorie_id'];


     public function categories()
     {
     	return $this->belongsTo('App\Categorie');
     }
}
