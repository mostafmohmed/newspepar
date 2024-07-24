<?php
namespace App\Repository;

interface New_interface{
    public function index();
    public function update( $id, $request);
    public function create($request);
    public function delete($id);
    public function show_favourite_news();
    public function   add_favourite_news( $request);

}