<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'nullable'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' =>false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
