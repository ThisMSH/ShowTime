<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\EpisodeResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(
            EpisodeResource::collection(
                Episode::orderBy('number')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpisodeRequest $request)
    {
        $request->validated();

        $title_no_whitespace = str_replace(' ', '-', $request->title);
        $number_no_whitespace = str_replace(' ', '-', $request->number);
        $file_name = "{$number_no_whitespace}-{$title_no_whitespace}";

        if ($request->hasFile('thumbnail')) {
            $thumbnail = "episodes/thumbnail/" . time() . "-{$file_name}.{$request->thumbnail->getClientOriginalExtension()}";
            Storage::disk('public')->put($thumbnail, file_get_contents($request->thumbnail));
        }

        if ($request->hasFile('video')) {
            $video = "episodes/videos/" . time() . "-{$file_name}.{$request->video->getClientOriginalExtension()}";
            Storage::disk('public')->put($video, file_get_contents($request->video));
        }

        $episode = Episode::create([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id,
            'episode_type' => $request->premium,
            'title' => $request->title,
            'number' => $request->number,
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'video' => $video
        ]);

        return $this->success(new EpisodeResource($episode));
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        $comments = $episode->comments()
            ->orderByDesc('id')
            ->get();

        $episode->loadCount('comments');

        return $this->success([
            'episode' => new EpisodeResource($episode),
            'comments' => CommentResource::collection($comments)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        $request->validated();

        $title_no_whitespace = str_replace(' ', '-', $request->title ?? $episode->title);
        $number_no_whitespace = str_replace(' ', '-', $request->number ?? $episode->number);
        $file_name = "{$number_no_whitespace}-{$title_no_whitespace}";

        if ($request->hasFile('thumbnail')) {
            $thumbnail = "episodes/thumbnail/" . time() . "-{$file_name}.{$request->thumbnail->getClientOriginalExtension()}";
            Storage::disk('public')->put($thumbnail, file_get_contents($request->thumbnail));
        } else {
            $thumbnail = null;
        }

        if ($request->hasFile('video')) {
            $video = "episodes/videos/" . time() . "-{$file_name}.{$request->video->getClientOriginalExtension()}";
            Storage::disk('public')->put($video, file_get_contents($request->video));
        } else {
            $video = null;
        }

        $request->thumbnail = $thumbnail;
        $request->video = $video;

        $episode->update($request->all());

        return $this->success(new EpisodeResource($episode));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        return $episode->delete();
    }
}
