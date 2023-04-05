<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PROJECT_CATE;
use Validator;
use DB;

class PROJECT_CATEController extends Controller
{

    // Select projects with a categorie given
    public function projectwithCATE($ID_CATE)
    {
        $projects = DB::table('PROJECT_CATE')->SELECT("*")->join("CATEGORIE", "CATEGORIE.ID_CATE", "=", "PROJECT_CATE.ID_CATE")->get();

        return response()->json($projects);
    }
    // Create a link between a categorie and a project
    public function newPROJECT_CATE(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_PRO ' => ['required', 'integer'],
            'ID_CATE ' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $project_cate = new PROJECT_CATE;

        $project_cate->ID_PRO = $request->ID_PRO;
        $project_cate->ID_CATE = $request->ID_CATE;

        $ok = $project_cate->save();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "project_cate created"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Problems While creating"
            ], 400);
        }
    }
    // Modify a link between a categorie and a project
    public function modifPROJECT_CATE(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ID_PRO ' => ['required', 'integer'],
            'ID_CATE ' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $project_cate = PROJECT_CATE::where("ID_PRO", "=", $request->ID_PRO)->first();

        if ($project_cate) {

            $project_cate->ID_PRO = $request->ID_PRO;
            $project_cate->ID_CATE = $request->ID_CATE;

            $ok = $project_cate->save();

            if ($ok) {
                return response()->json(["status" => 1, "message" => "project_cate modified"], 201);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Problems While Modifying"
                ], 400);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This project doesn't exist !"
            ], 400);
        }
    }
    // Delete a link between a categorie and a project
    public function supPROJECT_CATE($ID_PRO, $ID_CATE)
    {
        $project_cate = PROJECT_CATE::where("ID_PRO", "=", $ID_PRO)->where("ID_CATE", "=", $ID_CATE);

        $ok = $project_cate->delete();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "project_cate deleted"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This project_cate doesn't exist !"
            ], 400);
        }
    }
}
