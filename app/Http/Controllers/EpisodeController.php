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
        $is_liked = auth()->user()?->episode_likes()->where('episodes.id', $episode->id)->exists();

        return view('episodes.show')->with(compact('episode', 'is_liked'));
    }
}
