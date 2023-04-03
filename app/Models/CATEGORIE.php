<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CATEGORIE extends Model
{
    use HasFactory;

    protected $table = "CATEGORIE";

    protected $primaryKey = ["ID_CATE", "ID_USER_CREATED"];
}
