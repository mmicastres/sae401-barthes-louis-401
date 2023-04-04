<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USER;

class USERController extends Controller
{
    public function USER(Request $request)
    {
        $user = USER::select("ID_USER", "PSEUDO_USER", "LEVEL_USER")->get();
        return response()->json($user);
    }

}
