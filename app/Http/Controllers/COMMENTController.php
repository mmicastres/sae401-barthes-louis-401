<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\COMMENT;
use Validator;

class COMMENTController extends Controller
{

    // Select the details of all comment
    public function listCOM(Request $request)
    {
        $returned = COMMENT::select("ID_COMMENT", "ID_USER_IS_COMMENTED", "ID_PRO", "MESSAGE")->get();
        return response()->json($returned);
    }
    // Select the details of one comment
    public function oneCOM($ID_COMMENT)
    {
        $comment = COMMENT::select("ID_COMMENT", "ID_USER_IS_COMMENTED", "ID_PRO", "MESSAGE")->where("ID_COMMENT", "=", $ID_COMMENT)->get();
        return response()->json($comment);
    }
    // create a new comment
    public function newCOM(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_COMMENT ' => ['required', 'integer'],
            'ID_USER_IS_COMMENTED ' => ['required', 'integer'],
            'ID_PRO ' => ['required', 'integer'],
            'MESSAGE' => ['required']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $comment = new COMMENT;

        $comment->ID_COMMENT = $request->ID_COMMENT;
        $comment->ID_USER_IS_COMMENTED = $request->ID_USER_IS_COMMENTED;
        $comment->ID_PRO = $request->ID_PRO;
        $comment->MESSAGE = $request->MESSAGE;

        $ok = $comment->save();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "comment created"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Problems While creating"
            ], 400);
        }
    }
    // modify a comment
    public function modifCOM(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ID_COMMENT ' => ['required', 'integer'],
            'ID_USER_IS_COMMENTED ' => ['required', 'integer'],
            'ID_PRO ' => ['required', 'integer'],
            'MESSAGE' => ['required']
        ]);
        if ($validator->fails()) {
            return $validator->error();
        }


        $comment = COMMENT::where("ID_COMMENT", "=", $request->ID_COMMENT)->first();

        if ($comment) {

            $comment->ID_COMMENT = $request->ID_COMMENT;
            $comment->ID_USER_IS_COMMENTED = $request->ID_USER_IS_COMMENTED;
            $comment->ID_PRO = $request->ID_PRO;
            $comment->MESSAGE = $request->MESSAGE;


            $ok = $comment->save();

            if ($ok) {
                return response()->json(["status" => 1, "message" => "comment modified"], 201);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Problems While Modifying"
                ], 400);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This comment doesn't exist !"
            ], 400);
        }
    }
    // delete an old comment
    public function supCOM($ID_COMMENT)
    {
        $comment = COMMENT::where("ID_COMMENT", "=", $ID_COMMENT);

        $ok = $comment->delete();

        if ($ok) {
            return response()->json(["status" => 1, "message" => "comment deleted"], 201);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This comment doesn't exist !"
            ], 400);
        }
    }
}