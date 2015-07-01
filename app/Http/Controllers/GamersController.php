<?php

namespace DashboardersHeaven\Http\Controllers;

use DashboardersHeaven\Gamer;
use Illuminate\Http\Request;

use DashboardersHeaven\Http\Requests;
use DashboardersHeaven\Http\Controllers\Controller;

class GamersController extends Controller
{
    /**
     * Display a listing of the gamers.
     *
     * @return Response
     */
    public function index()
    {
        $gamers = Gamer::with('games')->get();
        return view('pages.gamer', compact('gamers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
}
