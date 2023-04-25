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
                "wide-cover" => asset(Storage::url($this->wide_cover)),
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
                : null,
                "sequel" => $this->sequel ?
                [
                    "id" => (string)$this->sequel,
                    "title" => Show::find($this->sequel)->title,
                    "season" => Show::find($this->sequel)->season,
                    "cover" => asset(Storage::url(Show::find($this->sequel)->cover))
                ]
                : null,
                "category" => [
                    "id" => (string)$this->category->id,
                    "name" => $this->category->category
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
