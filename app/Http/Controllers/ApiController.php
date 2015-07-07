<?php

namespace DashboardersHeaven\Http\Controllers;

use Illuminate\Http\Request;
use DashboardersHeaven\Gamer;
use DashboardersHeaven\Http\Requests;
use DashboardersHeaven\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Returns a history of all gamerscores for a member.
     *
     * @return Response
     */
    public function gamerscores($id)
    {
        // I know this is bad, but we'll just use this for testing.
        // This will be fixed later when we make an actual API.
        $gamer = Gamer::findOrFail($id);
        return $gamer->gamerscores;
    }
}
