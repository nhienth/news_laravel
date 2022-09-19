<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    public $primaryKey = 'comment_id';
    protected $fillable = [
        'comment_content',
        'news_id',
        'comment_date',
        'comment_status',
    ];

    public $timestamps = true;

    const CREATED_AT = 'comment_date';
    const UPDATED_AT = 'date_updated';

    protected $attributes = [
        'comment_status' => 1
    ];

    public function post() {
        return $this->belongsTo(Post::class, 'news_id', 'news_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
