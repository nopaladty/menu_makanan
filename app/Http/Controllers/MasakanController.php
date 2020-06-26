<?php

namespace App\Http\Controllers;

use App\Masakan;
use Illuminate\Http\Request;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$masakan = Masakan::all();
    	return view('listmasakan', ['list' => $masakan]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function show(Masakan $masakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Masakan $masakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masakan $masakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masakan $masakan)
    {
        //
    }
}
