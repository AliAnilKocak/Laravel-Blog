<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "category";
  //  protected $fillable = ['name','slug']; //Add column permission
    protected $guarded = []; //this all columns are addable

    public function posts(){
        return $this->belongsToMany('App\Models\Post','category_post');
        //Bir kategoriye ait ürünleri getirir. belongToMany M:M ilişkiyi işaret eder.
    }

    public function parent_category(){
      return   $this->belongsTo('\App\Models\Category','parent_id')->withDefault([
            'name'=>'Main Category'
        ]);
    }
}
