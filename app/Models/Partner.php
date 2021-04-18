<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "updated_by",
        "name",
        "logo",
        "website",
        "email",
        "phone",
        "address",
    ];

}
