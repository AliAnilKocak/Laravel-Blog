<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    protected $table = "post";
    protected $fillable = ['title','description','slug','content','img','author'];

    public function detail()
    {
        return $this->hasOne('App\Models\PostDetail')->withDefault();
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag','tag_post');
        //Bir kategoriye ait ürünleri getirir. belongToMany M:M ilişkiyi işaret eder.
    }
    public function categories(){
        return $this->belongsToMany('App\Models\Category','category_post');
        //Bir kategoriye ait ürünleri getirir. belongToMany M:M ilişkiyi işaret eder.
    }


}
