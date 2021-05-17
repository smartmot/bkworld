<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "json",
        "content",
    ];
    protected $appends = [
        "data",
    ];

    public function getDataAttribute(){
        return json_decode($this->json, true);
    }
}
