<?php
namespace App\Repository;
use App\Helpers\ApiResponse;
use App\Models\Detartment_Head;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Detartment_Head_Repository implements Detartment_Head_interface{

    public function login($request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ], [], [
            'email' => 'email',
            'password' => 'password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Login Validation Errors', $validator->errors());
        }

        if (Auth::guard('Detartment_Head')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('Detartment_Head')->user();
            $data['token'] =  $user->createToken('MYAPP',['Detartment_Head'])->plainTextToken;
            $data['name'] =  $user->name;
            $data['email'] =  $user->email;
            return ApiResponse::sendResponse(200, 'Login Successfully', $data);
        } else {
            return ApiResponse::sendResponse(401, 'These credentials doesn\'t exist', null);
        }
   


   


    }
    
    
    
    public function Detartment_Head($request){

        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:' . Detartment_Head::class],
                'password' => ['required'],
            ], [], [
                'name' => 'Name',
                'email' => 'Email',
                'password' => 'Password',
            ]);
    
            if ($validator->fails()) {
                return ApiResponse::sendResponse(422, 'Register Validation Errors', $validator->messages()->all());
            }
    
          
           

                $Detartment_Head = new Detartment_Head();
                $Detartment_Head->password=Hash::make($request->password);
                $Detartment_Head->name=$request->name;
                $Detartment_Head->email=$request->email;

                $Detartment_Head->save();
                $data['token'] = $Detartment_Head->createToken('MYAPP',['Detartment_Head'])->plainTextToken;
                $data['name'] = $Detartment_Head->name;
                $data['email'] = $Detartment_Head->email;
                
                   
            return ApiResponse::sendResponse(201, 'User Account Created Successfully', $data);
            }
            catch (Exception $e) {
                return    ApiResponse::sendResponse(401,'error');
            }
    
        }
}
