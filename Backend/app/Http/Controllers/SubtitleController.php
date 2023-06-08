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

        if ($request->hasFile('sub_file')) {
            $name = "subtitles/" . uniqid() . '.' . $request->sub_file->getClientOriginalExtension();
            Storage::disk('public')->put($name, file_get_contents($request->sub_file));
        }

        $subtitle = Subtitle::create([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id,
            'subtitle_name' => $request->sub_name,
            'subtitle_file' => $name
        ]);

        return $this->success(new SubtitleResource($subtitle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubtitleRequest $request, Subtitle $subtitle)
    {
        $request->validated();

        if ($request->hasFile('sub_file')) {
            $name = "subtitles/" . uniqid() . '.' . $request->sub_file->getClientOriginalExtension();
            Storage::disk('public')->put($name, file_get_contents($request->sub_file));
            $subtitle->update(['subtitle_file' => $name]);
        }

        $subtitle->update($request->except(['subtitle_file']));

        return $this->success(new SubtitleResource($subtitle));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtitle $subtitle)
    {
        return $subtitle->delete();
    }
}
