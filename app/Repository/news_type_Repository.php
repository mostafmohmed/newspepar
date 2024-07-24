<?php
namespace App\Repository;
use App\Helpers\ApiResponse;
use App\Models\News_Type;
use Exception;
class news_type_Repository implements news_type_interface{
    public function index(){
        try {
        $news_type=News_Type::all();
        return ApiResponse::sendResponse(200, 'Login Successfully', $news_type);
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }

    }
    public function update($id, $request){

        try {
            $news_type=News_Type::find($id);
            $news_type->describe=$request->describe;
            $news_type->save();
            return  ApiResponse::sendResponse(200,'update susess',$news_type);
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }

    }
    public function create($request){
        try {
            $news_type=new News_Type();
            $news_type->describe=$request->describe;
            $news_type->save();
            return  ApiResponse::sendResponse(200,'create susess',$news_type);
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
    public function delete($id){
        try {
           
            $news_type=News_Type::find($id);
            $news_type->delete();
            return  ApiResponse::sendResponse(201, 'delete sucess');
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
}