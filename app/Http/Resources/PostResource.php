<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // to get the data of user
            'userData' => new UserResource($this->user)
            // [
            //     'userId' => $this->user->id,
            //     'userName' => $this->user->name
            // ]
        ];
    }
}
