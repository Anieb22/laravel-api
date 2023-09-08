<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Leads;
use App\Mail\NewContact;

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

        $new_Lead = new Lead();
        $new_Lead->fill($data);
        $new_Lead->save();

        Mail::to('contact@boolpress.com')->send(new NewContact($new_Lead));

        return responde()->json([
            'success' => true
        ]);
    }
}
