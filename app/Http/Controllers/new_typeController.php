<?php

namespace App\Http\Controllers;

use App\Repository\news_type_Repository;
use Illuminate\Http\Request;

class new_typeController extends Controller
{
    public $r;
    public function __construct(news_type_Repository $e) {
        $this->r = $e;
    }
    public function index(){
        return $this->r->index();
    }
    public function update( $id, Request $request){
        return $this->r->update( $id, $request);
    }
    public function create(Request $request){
        return $this->r->create( $request);
    }
    public function delete($id){
        return $this->r->delete( $id);
    }
}
