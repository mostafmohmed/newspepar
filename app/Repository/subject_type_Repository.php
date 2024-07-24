<?php
namespace App\Repository;

use App\Helpers\ApiResponse;
use App\Http\Resources\subject_type_resource;
use App\Models\Subject_Type;
use Exception;

class subject_type_Repository implements subject_type_interface{
    public function index(){
        try {
            $subject_type= Subject_Type::get();
           return subject_type_resource::collection( $subject_type);
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
    public function update( $id, $request){
        try {
            $subject_type= Subject_Type::find($id);
            $subject_type->describe=$request->describe;
            $subject_type->news_id=$request->news_id;
            $subject_type->save();
            return  ApiResponse::sendResponse(200, 'subject_type update susess',$subject_type);
           }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }

    }
    public function create($request){
        try {
            $subject_type=new Subject_Type();
            $subject_type->describe=$request->describe;
            $subject_type->news_id=$request->news_id;
            $subject_type->save();
            return  ApiResponse::sendResponse(200, 'subject_type create susess',$subject_type);
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
    public function delete($id){
        
    }
}