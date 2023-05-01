<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Http\Resources\EpisodeResource;
use App\Http\Resources\ShowResource;
use App\Http\Resources\TrailerResource;
use App\Models\Episode;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalAnime = Show::whereIn('category_id', [3, 4])->count();
        $totalLiveAction = Show::whereIn('category_id', [1, 2])->count();
        $totalEpisodes = Episode::count();

        return $this->success([
            'shows' => ShowResource::collection(Show::orderBy('title')->get()),
            'total_anime' => (string)$totalAnime,
            'total_liveaction' => (string)$totalLiveAction,
            'total_episodes' => (string)$totalEpisodes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        $request->validated();

        $title_no_whitespace = preg_replace('/[^A-Za-z0-9_-]/', '-', $request->title);
        $season_no_whitespace = preg_replace('/[^A-Za-z0-9_-]/', '-', $request->season);
        $cover_name = $title_no_whitespace . "-" . $season_no_whitespace;

        if ($request->hasFile('cover')) {
            $cover = "shows/cover/{$cover_name}-cover.{$request->cover->getClientOriginalExtension()}";
            Storage::disk('public')->put($cover, file_get_contents($request->cover));
        }

        if ($request->hasFile('wide_cover')) {
            $wide_cover = "shows/wide-cover/{$cover_name}-wide-cover.{$request->wide_cover->getClientOriginalExtension()}";
            Storage::disk('public')->put($wide_cover, file_get_contents($request->wide_cover));
        }

        $show = Show::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'season' => $request->season,
            'description' => $request->description,
            'cover' => $cover,
            'wide_cover' => $wide_cover,
            'sequel' => $request->sequel,
            'prequel' => $request->prequel,
        ]);

        return $this->success(new ShowResource($show));
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        $episodes = $show->episodes()
            ->orderBy('number')
            ->get();

        $trailers = $show->trailers()
            ->orderBy('title')
            ->get();

        $show->loadCount('episodes');

        return $this->success([
            'show' => new ShowResource($show),
            'episodes' => EpisodeResource::collection($episodes),
            'trailers' => TrailerResource::collection($trailers)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
        $request->validated();
        // dump($request);

        $title_no_whitespace = preg_replace('/[^A-Za-z0-9_-]/', '-', $request->title ?? $show->title);
        $season_no_whitespace = preg_replace('/[^A-Za-z0-9_-]/', '-', $request->season ?? $show->season);
        $cover_name = "{$title_no_whitespace}-{$season_no_whitespace}";

        if ($request->hasFile('cover')) {
            $cover = "shows/cover/{$cover_name}-cover.{$request->cover->getClientOriginalExtension()}";
            Storage::disk('public')->put($cover, file_get_contents($request->cover));
            $request->merge(['cover' => $cover]);
            // $request->cover = $cover;
        }

        if ($request->hasFile('wide_cover')) {
            $wide_cover = "shows/wide-cover/{$cover_name}-wide-cover.{$request->wide_cover->getClientOriginalExtension()}";
            Storage::disk('public')->put($wide_cover, file_get_contents($request->wide_cover));
            $request->merge(['wide_cover' => $wide_cover]);
            // $request->wide_cover = $wide_cover;
        }

        // $show->update([
        //     'category_id' => $request->category_id,
        //     'title' => $request->title,
        //     'season' => $request->season,
        //     'description' => $request->description,
        //     'cover' => $request->cover,
        //     'wide_cover' => $request->wide_cover,
        //     'sequel' => $request->sequel,
        //     'prequel' => $request->prequel,
        // ]);
        $show->update($request->all());

        return $this->success(new ShowResource($show));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        return $show->delete();
    }

    /**
     * Search for a specific show.
     */
    public function search($search)
    {
        $search = Show::where('title', 'LIKE', '%' . $search . '%')->get();

        return $this->success(ShowResource::collection($search));
    }

    /**
     * Fetch all the shows with their episodes
     */
    public function showsWithEpisodes()
    {
        $shows_episodes = Show::with('episodes')->get();
        
        return $this->success([ShowResource::collection($shows_episodes)]);
    }
}
