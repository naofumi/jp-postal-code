<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostalCodeRequest;
use App\Http\Requests\UpdatePostalCodeRequest;
use App\Models\PostalCode;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postalCodes = PostalCode::orderBy('postal_code', 'asc')
                                ->prefecture($request->input('prefecture'))
                                ->duplicatedPostalCode($request->input('type') == 'duplicate')
                                ->paginate(50)->withQueryString();
        return view('postal_codes.index', ['postalCodes' => $postalCodes]);
    }

    public function search(Request $request)
    {
        $postalCodes = PostalCode::orderBy('postal_code', 'asc')
                                ->partialPostalCode($request->get('postal_code'))
                                ->limit(5)->get();
        return view('postal_codes.search', ['postalCodes' => $postalCodes]);
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
