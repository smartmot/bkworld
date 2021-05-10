<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "updated_by",
        "type",
        "name",
        "position",
        "photo",
        "facebook",
        "instagram",
        "youtube",
        "twitter",
        "description",
        "content",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function updater(){
        return $this->belongsTo(User::class, "updated_by");
    }
}
