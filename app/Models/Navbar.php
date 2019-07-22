<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;


class Navbar extends Model
{
    use SoftDeletes;
    protected $table = "navbar_category";
    protected $fillable = ['name','slug','color'];


}
