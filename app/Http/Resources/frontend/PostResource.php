<?php

namespace App\Http\Resources\frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "excerpt" => $this->excerpt,
            "user_id" => $this->user_id,
            "created_at" => $this->created_at,
            "reactions_count" => $this->reaction_count,
            "comments_count" => $this->comments_count,
        ];
    }
}
