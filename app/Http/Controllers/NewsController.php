<?php

namespace App\Http\Controllers;

use App\Repository\New_Repository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $r;
    public function __construct(New_Repository $e) {
        $this->r = $e;
    }
    public function index()
    {
        return $this->r->index();
    }
    public function show_favourite_news(){
        return $this->r->show_favourite_news();    
    }
    public function add_favourite_news(Request $request){
        return $this->r->add_favourite_news($request);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return $this->r->create( $request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->r->update($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->r->delete( $id);
    }
  
}
