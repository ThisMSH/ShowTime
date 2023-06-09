<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SubtitleResource extends JsonResource
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
                "name" => $this->subtitle_name,
                "file" => asset(Storage::url($this->subtitle_file))
            ],
            "relationships" => [
                "episode" => [
                    "id" => (string)$this->episode->id,
                    "title" => $this->episode->title,
                    "number" => $this->episode->number
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
