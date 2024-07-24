<?php
namespace App\Repository;
interface favourite__news_interface{
    public function index();
    public function update( $id, $request);
    public function create($request);
    public function delete($id);

}