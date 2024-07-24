<?php
namespace App\Repository;
interface news_type_interface{
    public function index();
    public function update( $id, $request);
    public function create($request);
    public function delete($id);

    // public function   add_favourite_news( $request);

}
