<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "category_id",
        "updated_by",
        "title",
        "content",
        "keyword",
        "youtube",
        "thumbnail",
        "description",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function updater(){
        return $this->belongsTo(User::class, "updated_by");
    }
    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }
}
