<?php

namespace App\Http\Controllers;

use App\Repository\subject_type_Repository;
use Illuminate\Http\Request;

class subject_type extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $r;
    public function __construct(subject_type_Repository $e) {
        $this->r = $e;
    }
    public function index()
    {
        return $this->r->index();
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
        //
    }
}
