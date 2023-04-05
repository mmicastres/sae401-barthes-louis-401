<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class CATEGORIE extends Model
{
    use HasFactory;
    use HasCompositeKey;

    protected $table = "CATEGORIE";

    protected $primaryKey = ["ID_CATE", "ID_USER_CREATED"];
    public $timestamps = false;
}
