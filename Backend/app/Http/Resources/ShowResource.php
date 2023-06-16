<?php

namespace App\Http\Resources;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => (string)$this->id,
            "attributes" => [
                "title" => $this->title,
                "season" => $this->season,
                "description" => $this->description,
                "cover" => asset(Storage::url($this->cover)),
                "wide_cover" => asset(Storage::url($this->wide_cover)),
                "created" => $this->created_at
            ],
            "relationships" => [
                "prequel" => $this->prequel ?
                    [
                        "id" => (string)$this->prequel,
                        "title" => Show::find($this->prequel)->title,
                        "season" => Show::find($this->prequel)->season,
                        "cover" => asset(Storage::url(Show::find($this->prequel)->cover))
                    ]
                    : "",
                "sequel" => $this->sequel ?
                    [
                        "id" => (string)$this->sequel,
                        "title" => Show::find($this->sequel)->title,
                        "season" => Show::find($this->sequel)->season,
                        "cover" => asset(Storage::url(Show::find($this->sequel)->cover))
                    ]
                    : "",
                "category" => [
                    "id" => (string)$this->category->id,
                    "name" => $this->category->category
                ],
                "episodes" => [
                    "count" => (string)$this->episodes_count ?? "0",
                    "list" => EpisodeResource::collection($this->whenLoaded('episodes')),
                ],
                "trailers" => [
                    "list" => TrailerResource::collection($this->whenLoaded('trailers'))
                ],
                "ratings" => [
                    "average" => (string)$this->avg_rating ?? "0",
                    "count" => (string)$this->ratings_count ?? "0"
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
