<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class UserShowFollowingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function toggleFollow(Request $request, Show $show)
    {
        $user = auth()->user();
        $user->show_followings()->toggle($show->id);

        return response()->json(['status' => 'success']);
    }
}
