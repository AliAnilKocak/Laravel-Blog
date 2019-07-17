<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use SoftDeletes;
    protected $table = "post_detail";
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}


