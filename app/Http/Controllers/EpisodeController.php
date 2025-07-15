<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        return view('episodes.show')->with(compact('episode'));
    }
}
