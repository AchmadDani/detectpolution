<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Upload extends JsonResource
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
        'id' =>$this->id,
        'user_id' =>$this->user_id,
        'image' =>$this->image,
        'updated_at' =>$this->updated_at->format('Y/m/d'),
        'created_at' =>$this->created_at->format('Y/m/d'),
       ];
    }
}
