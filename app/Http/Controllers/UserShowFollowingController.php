<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class UserShowFollowingController extends Controller
{
    /**
     * Toggle the following of a specific show
     */
    public function toggleFollow(Request $request, Show $show)
    {
        $user = auth()->user();
        $shows_ids = $user->show_followings()->toggle($show->id);
        $is_attached = in_array($show->id, $shows_ids['attached']);

        return response()->json(['status' => 'success', 'is_attached' => $is_attached]);
    }
}
