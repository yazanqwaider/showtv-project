<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function search(Request $request)
    {
        $results = Show::query()
                    ->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                    ->orWhereHas('episodes', function($query) use($request) {
                        $query
                            ->where('title', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('description', 'LIKE', '%' . $request->search . '%');
                    })
                    ->paginate(15);

        return view('search')->with(compact('results'));
    }

    public function randomShows()
    {
        $random_shows = Show::inRandomOrder()->limit(5)->get();

        return view('random-shows')->with(compact('random_shows'));
    }
}
