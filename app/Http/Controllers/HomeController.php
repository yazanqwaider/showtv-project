<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $latest_episodes = Episode::latest()->limit(10)->get();

        return view('home')->with(compact('latest_episodes'));
    }
}
