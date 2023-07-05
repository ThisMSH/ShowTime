<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FavoriteResource extends JsonResource
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
            "relationships" => [
                "show" => [
                    "id" => (string)$this->show->id,
                    "title" => $this->show->title,
                    "season" => $this->show->season,
                    "cover" => asset(Storage::url($this->show->cover)),
                    "avg_rating" => $this->show->ratings()
                        ->selectRaw('AVG(rating) as avg_rating')
                        ->pluck('avg_rating')
                        ->first()
                ]
            ]
        ];
    }
}
