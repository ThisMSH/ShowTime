<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TrailerResource extends JsonResource
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
                "trailer" => $this->trailer
            ],
            "relationships" => [
                "show" => [
                    "id" => (string)$this->show->id,
                    "title" => $this->show->title,
                    "season" => $this->show->season,
                    "category" => $this->show->category->category,
                    "cover" => asset(Storage::url($this->show->cover))
                ],
                "creator" => [
                    "username" => $this->user->username
                ]
            ]
        ];
    }
}
