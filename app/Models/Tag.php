<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use SoftDeletes;
    protected $table = "tag";
  //  protected $fillable = ['name','slug']; //Add column permission
    protected $guarded = []; //this all columns are addable

     public function posts(){
         return $this->belongsToMany('App\Models\Post','tag_post');
         //Bir kategoriye ait ürünleri getirir. belongToMany M:M ilişkiyi işaret eder.
     }
}
