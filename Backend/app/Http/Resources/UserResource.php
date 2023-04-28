<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
                "name" => $this->name,
                "username" => $this->username,
                "email" => $this->email,
                "birthday" => $this->birthday,
                "avatar" => asset(Storage::url($this->avatar)),
                "user_type" => (string)$this->user_type
            ],
        ];
    }
}
