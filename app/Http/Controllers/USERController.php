<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USER;
use Validator;

class USERController extends Controller
{
    public function listUSER(Request $request)
    {
        $user = USER::select("ID_USER", "PSEUDO_USER", "LEVEL_USER")->get();
        return response()->json($user);
    }

    // create a new project
    public function createUSER(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'PSEUDO_USER' => ['required', 'alpha_num'],
            'PWD_USER' => ['required', 'alpha_num'],
            'NAME_USER' => ['required', 'alpha'],
            'SURNAME_USER' => ['required', 'alpha'],
            'MAIL_USER' => ['required', 'alpha_num'],
            'AGE_USER' => ['required', 'num'],
            'SUBDATE_USER' => ['required', 'date_format:Y-m-d'],
            'BIO_USER' => ['required', 'alpha_num'],
            'LEVEL_USER' => ['required', 'num'],
            'ADMIN' => ['required', 'integer'],
            'FORMATION_STUDENT' => ['alpha_num'],
            'YEAR_STUDENT' => ['num'],
            'SCHOOL_PROF' => ['alpha_num'],
            'TEACHING_PROF' => ['alpha_num'],
            'PROF_ETU' => ['integer'],
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $user = new USER;

        $user->PSEUDO_USER = $request->PSEUDO_USER;
        $user->PWD_USER = $request->PWD_USER;
        $user->NAME_USER = $request->NAME_USER;
        $user->SURNAME_USER = $request->SURNAME_USER;
        $user->MAIL_USER = $request->MAIL_USER;
        $user->AGE_USER = $request->AGE_USER;
        $user->SUBDATE_USER = $request->SUBDATE_USER;
        $user->BIO_USER = $request->BIO_USER;
        $user->LEVEL_USER = $request->LEVEL_USER;
        $user->ADMIN = $request->ADMIN;
        $user->FORMATION_STUDENT = $request->FORMATION_STUDENT;
        $user->YEAR_STUDENT = $request->YEAR_STUDENT;
        $user->SCHOOL_PROF = $request->SCHOOL_PROF;
        $user->TEACHING_PROF = $request->TEACHING_PROF;
        $user->PROF_ETU = $request->PROF_ETU;


        $ok = $user->save();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "Project created"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Problems While creating"
            ], 400);
        }
    }

}
