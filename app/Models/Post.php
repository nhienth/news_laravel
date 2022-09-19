<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $primaryKey = 'news_id';
    protected $fillable = [
        'category_id',
        'news_title',
        'news_img',
        'news_summary',
        'news_content',
        'date_posted',
        'date_updated',
        'news_status',
        'author_id',
        'news_views',
    ];

    public $timestamps = true;

    const CREATED_AT = 'date_posted';
    const UPDATED_AT = 'date_updated';

    protected $attributes = [
        'news_views' => 0
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id', 'user_id');
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'news_id');
    }
}
