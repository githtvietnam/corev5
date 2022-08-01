<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
   use HasFactory, SoftDeletes;

   protected $fillable = [
      'name',
      'canonical',
      'image',
      'publish',
      'default'
   ];

   protected $table = 'translates';


    public function product_catalogues(){
      return $this->belongsToMany(ProductCatalogue::class, 'post_catalogue_translate' ,'translate_id','post_catalogue_id')->withPivot('name','canonical','meta_title','meta_keyword','meta_description','viewed','description','content','userid_created','userid_updated','script')->withTimestamps();
   }
}
