<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "attributes" => [
                "title" => $this->title,
                "number" => $this->number,
                "description" => $this->description,
                "premium" => (string)$this->episode_type,
                "thumbnail" => asset(Storage::url($this->thumbnail)),
                "video" => Auth::user() && (Auth::user()->user_type == 1 || Auth::user()->user_type == 2 || Auth::user()->user_type == $this->episode_type) ? asset(Storage::url($this->video)) : null,
                "created" => $this->created_at,
                "comments_count" => (string)$this->comments_count ?? ""
            ],
            "relationships" => [
                "show" => [
                    "id" => (string)$this->show->id,
                    "title" => $this->show->title,
                    "season" => $this->show->season
                ],
                "subtitles" => [
                    "list" => SubtitleResource::collection($this->whenLoaded('subtitles'))
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
