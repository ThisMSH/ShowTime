<?php

namespace App\Http\Controllers;

use App\Models\Subtitle;
use App\Http\Requests\StoreSubtitleRequest;
use App\Http\Requests\UpdateSubtitleRequest;
use App\Http\Resources\SubtitleResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubtitleController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubtitleRequest $request)
    {
        $request->validated();

        if ($request->hasFile('subtitle_file')) {
            $name = "subtitles/" . uniqid() . '.' . $request->subtitle_file->getClientOriginalExtension();
            Storage::disk('public')->put($name, file_get_contents($request->subtitle_file));
        }

        $subtitle = Subtitle::create([
            'user_id' => Auth::id(),
            'episode_id' => $request->episode_id,
            'subtitle_name' => $request->subtitle_name,
            'subtitle_file' => $name
        ]);

        return $this->success(
            new SubtitleResource($subtitle),
            "\"{$subtitle->subtitle_name}\" subtitle for \"{$subtitle->episode->number} - {$subtitle->episode->title}\" has been created successfully."
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubtitleRequest $request, Subtitle $subtitle)
    {
        $request->validated();

        if ($request->hasFile('subtitle_file')) {
            if ($request->subtitle_file->getClientOriginalExtension() != "srt" && $request->subtitle_file->getClientOriginalExtension() != "ass") {
                return $this->error("", "The file type must be .srt or .ass", 422);
            }

            $name = "subtitles/" . uniqid() . '.' . $request->subtitle_file->getClientOriginalExtension();
            Storage::disk('public')->put($name, file_get_contents($request->subtitle_file));
            $subtitle->update(['subtitle_file' => $name]);
        }

        $subtitle->update($request->except(['subtitle_file']));

        return $this->success(
            new SubtitleResource($subtitle),
            "\"{$subtitle->subtitle_name}\" subtitle has been updated successfully."
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtitle $subtitle)
    {
        $sub_name = $subtitle->subtitle_name;
        $subtitle->delete();

        return $this->success(
            null,
            "\"{$sub_name}\" subtitle has been deleted successfully."
        );
    }
}
