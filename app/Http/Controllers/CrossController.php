<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PROJECT;
use App\Models\USER;
use Validator;

class CrossController extends Controller
{
    // double requette page perso

    public function crossINFO($ID_USER)
    {
        $user = USER::select("PSEUDO_USER", "LEVEL_USER", "FORMATION_STUDENT", "YEAR_STUDENT", "SCHOOL_PROF", "TEACHING_PROF")->where("ID_USER", "=", $ID_USER)->first();
        $projects = PROJECT::select("ID_USER_IS_POSTED", "NAME_PROJ", "DESCRIPTION_PROJ", "DATE_PROJ", "IMG_PROJ")->where("ID_USER_IS_POSTED", "=", $ID_USER)->get();
        $user["projects"] = $projects;

        return response()->json($user);
    }
}

//SELECT * FROM `PROJECT_CATE` inner join `CATEGORIE` on (PROJECT_CATE.ID_CATE=CATEGORIE.ID_CATE)