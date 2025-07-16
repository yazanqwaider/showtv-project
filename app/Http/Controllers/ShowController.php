<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        $is_followed = auth()->user()?->show_followings()->where('shows.id', $show->id)->exists();

        return view('shows.show')->with(compact('show', 'is_followed'));
    }
}
