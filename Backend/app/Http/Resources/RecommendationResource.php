<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RecommendationResource extends JsonResource
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
                "color" => $this->color,
                "character" => asset(Storage::url($this->character)),
                "logo" => asset(Storage::url($this->logo))
            ],
            "relationships" => [
                "show" => [
                    "id" => (string)$this->show->id,
                    "title" => $this->show->title,
                    "season" => $this->show->season,
                    "description" => $this->show->description
                ]
            ]
        ];
    }
}
