<?php

namespace DashboardersHeaven\Http\Controllers;

use Illuminate\Http\Request;

use DashboardersHeaven\Http\Requests;
use DashboardersHeaven\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.home');
    }
}
