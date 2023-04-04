<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PROJECT;

class PROJECTController extends Controller
{
    public function listPROJECT(Request $request)
    {
        $project = PROJECT::select("ID_USER_IS_POSTED", "NAME_PROJ", "DESCRIPTION_PROJ", "DATE_PROJ", "IMG_PROJ")->get();
        return response()->json($project);
    }

    public function newPROJECT(Request $request)
    {
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

    public function modifPROJECT(Request $request)
    {
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