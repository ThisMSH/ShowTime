<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CommentResource extends JsonResource
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
                "comment" => $this->comment,
                "created" => $this->created_at
            ],
            "relationships" => [
                "creator" => [
                    "user_id" => $this->user->id,
                    "name" => $this->user->name,
                    "username" => $this->user->username,
                    "avatar" => asset(Storage::url($this->user->avatar))
                ],
            ]
        ];
    }
}
