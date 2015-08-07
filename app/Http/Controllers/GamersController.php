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
        $gamers = Gamer::all();
        return view('pages.gamers', compact('gamers'));
    }

    /**
     * Display the specified gamer.
     *
     * @param $gamer
     * @return Response
     */
    public function show(Gamer $gamer)
    {
        return view('pages.profile', compact('gamer'));
    }

    /**
     * Display all clips for a gamer.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function clips($id)
    {
        //return view('pages.clips', compact('gamertag'));
    }
}
