<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Show;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episode::with('show')->paginate(15);

        return view('dashboard.episodes.index')->with(compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shows = Show::select('id', 'title')->get();

        return view('dashboard.episodes.create')->with(compact('shows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $thumbnail_url = $video_url = '';

            if($request->hasFile('thumbnail'))  {
                $thumbnail_url = $request->file('thumbnail')->store('episodes/thumbnails', 'public');
            }

            if($request->hasFile('video'))  {
                $video_url = $request->file('video')->store('episodes/videos', 'public');
            }

            Episode::create(
                $request->only('show_id', 'title', 'description', 'duration', 'airing_dt') +
                [
                    'thumbnail_url' => $thumbnail_url,
                    'video_url' => $video_url,
                ]
            );

            DB::commit();

            return redirect()->route('dashboard.episodes.index')->with(['status' => 'success', 'message' => 'Episode Added Successfully.']);
        } catch (\Exception $e) {
            logger()->error($e);
            DB::rollback();
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
        $shows = Show::select('id', 'title')->get();
        $episode = Episode::find($id);

        return view('dashboard.episodes.edit')->with(compact('shows', 'episode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episode = Episode::find($id);

        DB::beginTransaction();
        try {
            $thumbnail_url = $episode->thumbnail_url;
            $video_url = $episode->video_url;

            if($request->hasFile('thumbnail'))  {
                Storage::disk('public')->delete($thumbnail_url);
                $thumbnail_url = $request->file('thumbnail')->store('episodes/thumbnails', 'public');
            }

            if($request->hasFile('video'))  {
                Storage::disk('public')->delete($video_url);
                $video_url = $request->file('video')->store('episodes/videos', 'public');
            }

            $episode->update(
                $request->only('show_id', 'title', 'description', 'duration', 'airing_dt') +
                [
                    'thumbnail_url' => $thumbnail_url,
                    'video_url' => $video_url,
                ]
            );

            DB::commit();

            return redirect()->route('dashboard.episodes.index')->with(['status' => 'success', 'message' => 'Episode Updated Successfully.']);
        } catch (\Exception $e) {
            logger()->error($e);
            DB::rollback();
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
