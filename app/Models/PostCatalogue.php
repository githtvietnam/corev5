<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PostCatalogue extends Model
{
   use HasFactory, SoftDeletes;


   protected $fillable = [
      'parentid',
      'lft',
      'rgt',
      'level',
      'image',
      'album',
      'order',
      'publish',
   ];

  protected $table = 'post_catalogues';

  public function translates(){
     return $this->belongsToMany(Translate::class, 'post_catalogue_translate' , 'post_catalogue_id', 'translate_id')
     ->withPivot('name','canonical','meta_title','meta_keyword','meta_description','viewed','description','content','userid_created','userid_updated','script')->withTimestamps();
  }
}
