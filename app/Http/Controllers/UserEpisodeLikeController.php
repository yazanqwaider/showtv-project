<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class UserEpisodeLikeController extends Controller
{
    /**
     * Toggle the like of a specific episode
     */
    public function toggleLike(Request $request, Episode $episode)
    {
        $user = auth()->user();
        $episodes_ids = $user->episode_likes()->toggle($episode->id);
        $is_attached = in_array($episode->id, $episodes_ids['attached']);

        return response()->json(['status' => 'success', 'is_attached' => $is_attached]);
    }
}
