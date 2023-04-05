<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PROJECT;
use Validator;

class PROJECTController extends Controller
{

    // Select the details of all project
    public function listPROJECT(Request $request)
    {
        $returned = PROJECT::select("ID_USER_IS_POSTED", "NAME_PROJ", "DESCRIPTION_PROJ", "DATE_PROJ", "IMG_PROJ")->get();
        return response()->json($returned);
    }
    // Select the details of one project
    public function onePROJECT($ID_PRO)
    {
        $project = PROJECT::select("ID_USER_IS_POSTED", "NAME_PROJ", "DESCRIPTION_PROJ", "DATE_PROJ", "IMG_PROJ")->where("ID_PRO", "=", $ID_PRO)->get();
        return response()->json($project);
    }
    // create a new project
    public function newPROJECT(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_USER_IS_POSTED' => ['required', 'integer'],
            'NAME_PROJ' => ['required', 'alpha'],
            'DESCRIPTION_PROJ' => ['required', 'alpha_num'],
            'DATE_PROJ' => ['required', 'date_format:Y-m-d'],
            'IMG_PROJ' => ['required', 'img']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $project = new PROJECT;

        $project->ID_USER_IS_POSTED = $request->ID_USER_IS_POSTED;
        $project->NAME_PROJ = $request->NAME_PROJ;
        $project->DESCRIPTION_PROJ = $request->DESCRIPTION_PROJ;
        $project->DATE_PROJ = $request->DATE_PROJ;
        $project->IMG_PROJ = $request->IMG_PROJ;

        $ok = $project->save();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "Project created"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Problems While creating"
            ], 400);
        }
    }
    // modify a project
    public function modifPROJECT(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ID_USER_IS_POSTED' => ['required', 'integer'],
            'NAME_PROJ' => ['required', 'alpha_num'],
            'DESCRIPTION_PROJ' => ['required', 'integer'],
            'DATE_PROJ' => ['required', 'integer'],
            'IMG_PROJ' => ['required', 'integer']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $project = PROJECT::where("ID_PRO", "=", $request->ID_PRO)->first();

        if ($project) {

            $project->ID_USER_IS_POSTED = $request->ID_USER_IS_POSTED;
            $project->NAME_PROJ = $request->NAME_PROJ;
            $project->DESCRIPTION_PROJ = $request->DESCRIPTION_PROJ;
            $project->DATE_PROJ = $request->DATE_PROJ;
            $project->IMG_PROJ = $request->IMG_PROJ;


            $ok = $project->save();

            if ($ok) {
                return response()->json(["status" => 1, "message" => "Project modified"], 201);
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
    // delete an old project
    public function supPROJECT($ID_PRO)
    {
        $project = PROJECT::where("ID_PRO", "=", $ID_PRO);

        $ok = $project->delete();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "Project deleted"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This project doesn't exist !"
            ], 400);
        }
    }
}