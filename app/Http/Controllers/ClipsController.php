<?php namespace DashboardersHeaven\Http\Controllers;

use DashboardersHeaven\Clip;
use DashboardersHeaven\Gamer;

class ClipsController extends Controller
{
    /**
     * Displays the clips page for a gamer.
     *
     * @param $gamer
     * @return \Illuminate\View\View
     */
    public function clips(Gamer $gamer)
    {
        $clips = $gamer->clips()->paginate(16);

        if( ! $gamer) {
            app()->abort(404); //TODO: Probably make this better, maybe?
        }

        return view('pages.clips', ['gamer' => $gamer, 'clips' => $clips]);
    }

    /**
     * Displays a page showing a gamer's clip.
     *
     * @param $gamer
     * @param $clip
     * @return \Illuminate\View\View
     */
    public function clip(Gamer $gamer, Clip $clip)
    {
        return view('pages.clip', ['gamer' => $gamer, 'clip' => $clip]);
    }
}
