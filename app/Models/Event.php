<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "updated_by",
        "title",
        "start",
        "end",
        "content",
        "thumbnail",
        "keyword",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function updater(){
        return $this->belongsTo(User::class, "updated_by");
    }

}
