<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USER extends Model
{
    use HasFactory;

    protected $table = "USER";

    protected $primaryKey = "ID_USER";
}
