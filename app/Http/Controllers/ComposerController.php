<?php

namespace App\Http\Controllers;

use App\Composer;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Composer::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $composer = Composer::create($request->all());
        return response()->json($composer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Composer  $composer
     * @return Composer
     */
    public function show(Composer $composer)
    {
        return $composer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function edit(Composer $composer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composer $composer)
    {
        $composer->update($request->all());
        return response()->json($composer, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composer $composer)
    {
        $composer->delete();
        return response()->json(null, 204);
    }
}
