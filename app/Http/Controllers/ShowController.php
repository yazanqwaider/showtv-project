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
        return view('shows.show')->with(compact('show'));
    }
}
