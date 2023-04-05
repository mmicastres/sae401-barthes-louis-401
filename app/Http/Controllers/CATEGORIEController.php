<?php

namespace App\Http\Controllers;

use App\Models\CATEGORIE;
use Illuminate\Http\Request;
use Validator;

class CATEGORIEController extends Controller
{
    
    // Select the details of all categorie
    public function listCATE(Request $request)
    {
        $returned = CATEGORIE::select("ID_CATE", "ID_USER_CREATED", "NAME_CATE")->get();
        return response()->json($returned);
    }
    // Select the details of one categorie
    public function oneCATE($ID_CATE)
    {
        $returned = CATEGORIE::select("ID_CATE", "ID_USER_CREATED", "NAME_CATE")->where("ID_CATE", "=", $ID_CATE)->get();
        return response()->json($returned);
    }
    // create a new categorie
    public function newCATE(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_CATE' => ['required', 'integer'],
            'ID_USER_CREATED' => ['required', 'integer'],
            'NAME_CATE' => ['required', 'alpha_num']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $categorie = new CATEGORIE;

        $categorie->ID_CATE = $request->ID_CATE;
        $categorie->ID_USER_CREATED = $request->ID_USER_CREATED;
        $categorie->NAME_CATE = $request->NAME_CATE;

        $ok = $categorie->save();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "categorie created"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Problems While creating"
            ], 400);
        }
    }
    // modify a categorie
    public function modifCATE(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ID_CATE' => ['required', 'integer'],
            'ID_USER_CREATED' => ['required', 'integer'],
            'NAME_CATE' => ['required', 'alpha_num']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $categorie = CATEGORIE::where("ID_CATE", "=", $request->ID_CATE)->first();

        if ($categorie) {

            $categorie->ID_CATE = $request->ID_CATE;
            $categorie->ID_USER_CREATED = $request->ID_USER_CREATED;
            $categorie->NAME_CATE = $request->NAME_CATE;


            $ok = $categorie->save();

            if ($ok) {
                return response()->json(["status" => 1, "message" => "categorie modified"], 201);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Problems While Modifying"
                ], 400);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This categorie doesn't exist !"
            ], 400);
        }
    }
    // delete an old categorie
    public function supCATE($ID_CATE)
    {
        $categorie = CATEGORIE::where("ID_CATE", "=", $ID_CATE);

        $ok = $categorie->delete();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "categorie deleted"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This categorie doesn't exist !"
            ], 400);
        }
    }
}
