<?php

namespace App\Http\Controllers\Api;
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Exception;
class UserController extends Controller
{
    public function index(Request $request)
    {
        // $user = $request->all();
        $validator = validator::make([
            'name' => 'required|string|min:2|max:20',
            'password' => 'required|string|min:5|max:9',
            'email' => 'required|max:255|',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'data validation failed']);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            if ($user->id) {
                $result = array(
                    'status' => true, 'message' => 'data entered successfully', 'data' => $user
                );
            } else {
                $result = array(
                    'status' => false, 'message' => 'data entered failed'
                );
            }
            return response()->json([$result]);
        }
    }
    public function getusers()
    { try{

        $data = User::all();
        return response()->json(['message' => count($data) . 'here is your data', 'data' => $data]);
    }
        catch(Exception $e){
            return response()->json(['status' => false, 'message' => 'data validation failed', 'error_message' => $e->getMessage()]);
        }
        
    }
    public function getuserdetails($id)
    {
        $data = User::find($id);
        return response()->json(['message' => 'here is your data', 'data' => $data]);
    }
    public function updateuser(Request $request,$id)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required|string|min:2|max:20',
            'email' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'data validation failed', 'error_message' => $validator->errors()]);
        }
        $data = User::find($id);
        if (!$data) {
            // $user = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => bcrypt($request->password)
            // ]); 
            // return response()->json(['status' => false, 'message' => 'new data has been added succesfully','data' => $user]);
            return response()->json(['status' => false, 'message' => 'no id has bee found']);
        }
        // $user = $request->all();
       
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return response()->json(['status' => true, 'message' => 'user data updated succesfully', 'data' => $data]);
    }
    public function deleteuser(Request $request,$id)
    {
        $data = User::find($id);
        if (!$data) {
            return response()->json(['status' => false, 'message' =>  '  No id : '.$id .' has been found']);
        }
        // $user = $request->all();

       $result=$data->delete();
       if(!$result){

       
        return response()->json(['status' => true, 'message' => 'data cant be deleted of the id found : '.$data->id]);
       }
        return response()->json(['status' => true, 'message' => 'user data deleted succesfully']);
    }
    public function login(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required|string|min:2|max:20',
            'email' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'data validation failed', 'error_message' => $validator->errors()]);
        }
        $credentials= $request->only('email','password');  
        if(Auth::attempt($credentials))
        {
           $user = Auth::user();
           return response()->json(['status' => true, 'message' => 'login succesfully','data' => $user],202);

        }
        return response()->json(['status' => false, 'message' => 'Invalid Credentials'],401);
    }
}
