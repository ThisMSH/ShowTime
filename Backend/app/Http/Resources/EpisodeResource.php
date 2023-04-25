<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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
                "video" => asset(Storage::url($this->video)),
                "created" => $this->created_at
            ],
            "relationships" => [
                "show" => [
                    "id" => (string)$this->show->id,
                    "title" => $this->show->title,
                    "season" => $this->show->season
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
