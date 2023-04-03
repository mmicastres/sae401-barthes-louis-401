<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class PROJECT extends Model
{
    use HasFactory;
    use HasCompositeKey;

    protected $table = "PROJECT";

    protected $primaryKey = ["ID_PRO", "ID_USER_IS_POSTED"];

    public $timestamps = false;
}
