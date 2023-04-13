<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USER;
use Validator;

class USERController extends Controller
{

    // all informations about USERS
    public function listUSER(Request $request)
    {
        $user = USER::select("ID_USER", "PSEUDO_USER", "LEVEL_USER")->get();
        return response()->json($user);
    }
    // informations about one USER
    public function oneUSER($ID_USER)
    {
        $user = USER::select("ID_USER", "PSEUDO_USER", "LEVEL_USER")->where("ID_USER", "=", $ID_USER)->get();
        return response()->json($user);
    }
    // create a new USER
    public function createUSER(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'PSEUDO_USER' => ['required', 'alpha_num'],
            'PWD_USER' => ['required', 'alpha_dash'],
            'NAME_USER' => ['required', 'alpha'],
            'SURNAME_USER' => ['required', 'alpha'],
            'MAIL_USER' => ['required', 'email'],
            'AGE_USER' => ['required', 'integer'],
            'SUBDATE_USER' => ['required', 'date_format:Y-m-d'],
            'BIO_USER' => ['required'],
            'LEVEL_USER' => ['required', 'integer'],
            'ADMIN' => ['required', 'integer'],
            'FORMATION_STUDENT' => ['alpha_num'],
            'YEAR_STUDENT' => ['integer'],
            'SCHOOL_PROF' => ['alpha_num'],
            'TEACHING_PROF' => ['alpha_num'],
            'PROF_ETU' => ['integer']
        ]);
        if ($validator->fails()) {
            return $validator->errors();
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
    // Modify an USER
    public function modifUSER(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'PSEUDO_USER' => ['required', 'alpha_num'],
            'PWD_USER' => ['required', 'alpha_dash'],
            'NAME_USER' => ['required', 'alpha'],
            'SURNAME_USER' => ['required', 'alpha'],
            'MAIL_USER' => ['required', 'email'],
            'AGE_USER' => ['required', 'integer'],
            'SUBDATE_USER' => ['required', 'date_format:Y-m-d'],
            'BIO_USER' => ['required'],
            'LEVEL_USER' => ['required', 'integer'],
            'ADMIN' => ['required', 'integer'],
            'FORMATION_STUDENT' => ['alpha_num'],
            'YEAR_STUDENT' => ['integer'],
            'SCHOOL_PROF' => ['alpha_num'],
            'TEACHING_PROF' => ['alpha_num'],
            'PROF_ETU' => ['integer']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $user = USER::where("ID_USER", "=", $request->ID_USER)->first();

        if ($user) {

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
                return response()->json(["status" => 1, "message" => "user modified"], 201);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Problems While Modifying"
                ], 400);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This user doesn't exist !"
            ], 400);
        }
    }
    // Delete an USER
    public function supUSER($ID_USER)
    {
        $user = USER::where("ID_USER", "=", $ID_USER);

        $ok = $user->delete();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "user deleted"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This user doesn't exist !"
            ], 400);
        }
    }
    // Connexion
    public function connect(Request $request)
    {
        $user = USER::where("PWD_USER", "=",$request->PWD_USER)->where("PSEUDO_USER", "=",$request->PSEUDO_USER)->get()->first();
        return response()->json($user);
    }
}