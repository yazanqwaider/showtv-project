<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Show;
use App\Enums\ShowTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::withCount('episodes')->paginate(15);

        return view('dashboard.shows.index')->with(compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $show_types = ShowTypeEnum::cases();

        return view('dashboard.shows.create')->with(compact('show_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
             $show = Show::create($request->only('title', 'description', 'type'));

            $show->airing_time_config()->create([
                'sat' => isset($request->airing_time['sat']),
                'sun' => isset($request->airing_time['sun']),
                'mon' => isset($request->airing_time['mon']),
                'tue' => isset($request->airing_time['tue']),
                'wed' => isset($request->airing_time['wed']),
                'thu' => isset($request->airing_time['thu']),
                'fri' => isset($request->airing_time['fri']),
                'time'=> $request->time,
            ]);

            DB::commit();
            return redirect()->route('dashboard.shows.index')->with(['status' => 'success', 'message' => 'Show Added Successfully.']);
        } catch (\Exception $e) {
            logger()->error($e);
            DB::rollBack();
            return redirect()->back()->with(['status' => 'error', 'message' => 'Something Went Wrong !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $show = Show::with('airing_time_config')->find($id);
        $show_types = ShowTypeEnum::cases();

        return view('dashboard.shows.edit')->with(compact('show_types', 'show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $show = Show::find($id);

        DB::beginTransaction();
        try {
            $show->update($request->only('title', 'description', 'type'));

            $show->airing_time_config()->update([
                'sat' => isset($request->airing_time['sat']),
                'sun' => isset($request->airing_time['sun']),
                'mon' => isset($request->airing_time['mon']),
                'tue' => isset($request->airing_time['tue']),
                'wed' => isset($request->airing_time['wed']),
                'thu' => isset($request->airing_time['thu']),
                'fri' => isset($request->airing_time['fri']),
                'time'=> $request->time,
            ]);

            DB::commit();
            return redirect()->route('dashboard.shows.index')->with(['status' => 'success', 'message' => 'Show Updated Successfully.']);
        } catch (\Exception $e) {
            logger()->error($e);
            DB::rollBack();
            return redirect()->back()->with(['status' => 'error', 'message' => 'Something Went Wrong !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
