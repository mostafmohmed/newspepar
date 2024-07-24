<?php
namespace App\Repository;

use App\Helpers\ApiResponse;
use App\Models\Favourite_News;
use App\Models\News;
use App\Models\News_Type;
use Exception;
use Illuminate\Support\Facades\Storage;

class   New_Repository implements New_interface{
    public function index(){
        try {
        $news_type=News::with('news_type')->get();
        return ApiResponse::sendResponse(200, 'News all ', $news_type);
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }

    }
    public function update($id, $request){

        try {
            $news=News::find($id);
            $news->title=$request->title;
           
          $news->news_type_id= $request->has('news_type_id') ? $request->input('news_type_id') : $news->news_type_id;
            $news->text=$request->text;
            $news->save();
            if($request->hasfile('image')){
                Storage::disk('upload_attachments')->delete('attachments/'.$news->image);
                $imageName = time().'.'.$request->image->extension();
                $request->file('image')->storeAs('attachments/',$imageName,'upload_attachments');
                $news->image=$imageName;
                $news->save();
         }
            return    ApiResponse::sendResponse(200,'update sucess',$news);
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }

    }
    public function create($request){
      
     
        try {
          
            $news=new News();
            $news->news_type_id= $request->has('news_type_id') ? $request->input('news_type_id') : $news->news_type_id;
            $news->text=$request->text;
            $news->title=$request->title;
           
            

            $news->save();
            if($request->hasfile('image'))
{
    $imageName = time().'.'.$request->image->extension();
    $request->file('image')->storeAs('subjects/',$imageName,'upload_attachments');
  
    
    $newsd=$news->image()->create([
        'url'=>$imageName
    ]);

   
}
            return ApiResponse::sendResponse(200, 'News create ', $news);

        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
    public function   add_favourite_news( $request){
        try{
         $favourit_news= new  Favourite_News ();
         $favourit_news->date=$request->data;
         $favourit_news-> news_id=$request->news_id;
         $favourit_news-> save();
         return ApiResponse::sendResponse(200, 'News create ', $favourit_news);


        } catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
    public function show_favourite_news(){
        try{
$favourit_news=Favourite_News::with('news')->get();

 return  Favourite_News::collection($favourit_news->paginate(25));
        } catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }  
    }
    public function delete($id){
        try {
           
            $news=News::find($id);
            Storage::disk('upload_attachments')->delete('attachments/'.$news->image);
            $news->delete();
            return    ApiResponse::sendResponse(200,'delete sucess');
        }
        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }
    }
}