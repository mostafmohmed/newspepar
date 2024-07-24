<?php
namespace App\Repository;

use App\Helpers\ApiResponse;
use App\Models\Subject;
use Exception;

class subject_Repository implements subject_interface{
    public function index(){

    }
    public function update( $id, $request){

    }
    public function create($request){
        try{
            $subject= new Subject();

$subject->title=$request->title;
$subject->text=$request->text;
$subject->data=$request->data;
$subject->subject__types_id=$request->subject__types_id;

$subject->save();
if($request->hasfile('image'))
{
    $imageName = time().'.'.$request->image->extension();
    $request->file('image')->storeAs('subjects/',$imageName,'upload_attachments');
  
    
    $subject=$subject->image()->create([
        'url'=>$imageName
    ]);

   
}
return ApiResponse::sendResponse(201,'susess massage',$subject);

        }        catch (Exception $e) {
            return    ApiResponse::sendResponse(401,$e->getMessage());
        }


    }
    public function delete($id){
        
    }
}