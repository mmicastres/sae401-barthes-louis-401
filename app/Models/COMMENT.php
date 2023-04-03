<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COMMENT extends Model
{
    use HasFactory;

    protected $table = "COMMENT";

    protected $primaryKey = ["ID_COMMENT", "ID_USER_IS_COMMENTED", "ID_PRO"];
}
