<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function GetAll() {
        return DB::table('category')->get();
    }
    
    public function GetById($id) {
        return DB::table('category')->where('category_id', $id)->get();
    }

    protected $table = 'category';
    public $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
    ];

    public $timestamps = false;

    public function posts() {
        return $this->hasMany(Post::class, 'category_id');
    }
}
