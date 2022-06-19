<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostalCodeRequest;
use App\Http\Requests\UpdatePostalCodeRequest;
use App\Models\PostalCode;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostalCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostalCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function show(PostalCode $postalCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PostalCode $postalCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostalCodeRequest  $request
     * @param  \App\Models\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostalCodeRequest $request, PostalCode $postalCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostalCode $postalCode)
    {
        //
    }
}
