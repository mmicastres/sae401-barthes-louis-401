<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PROJECT_CATE extends Model
{
    use HasFactory;

    protected $table = "PROJECT_CATE";

    protected $primaryKey = ["ID_PRO", "ID_CATE"];
}
