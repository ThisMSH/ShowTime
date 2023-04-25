<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Http\Resources\ShowResource;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        $request->validated($request->all());

        $title_no_whitespace = str_replace(' ', '-', $request->title);

        if ($request->hasFile('cover')) {
            $cover = "shows/cover/" . $title_no_whitespace . "-cover." . $request->cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover, file_get_contents($request->cover));
        }

        if ($request->hasFile('wide_cover')) {
            $wide_cover = "shows/wide-cover/" . $title_no_whitespace . "-wide-cover." . $request->wide_cover->getClientOriginalExtension();
            Storage::disk('public')->put($wide_cover, file_get_contents($request->wide_cover));
        }

        $show = Show::create([
            'user_id' => 1,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }
}
