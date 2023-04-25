<?php

namespace App\Http\Resources;

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
                "wide-cover" => asset(Storage::url($this->wide_cover))
            ],
            "relationships" => [
                "prequel" => [
                    "id" => $this->prequel ? (string)$this->prequel : "",
                    "title" => $this->prequel ? $this->prequel->title : "",
                    "season" => $this->prequel ? $this->prequel->season : "",
                    "cover" => $this->prequel ? asset(Storage::url($this->prequel->cover)) : ""
                ],
                "sequel" => [
                    "id" => $this->sequel ? (string)$this->sequel : "",
                    "title" => $this->sequel ? $this->sequel->title : "",
                    "season" => $this->sequel ? $this->sequel->season : "",
                    "cover" => $this->sequel ? asset(Storage::url($this->sequel->cover)) : ""
                ],
                "category" => [
                    "id" => (string)$this->category->id,
                    "name" => $this->category->category
                ]
            ]
        ];
    }
}
