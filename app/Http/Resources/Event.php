<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Event extends Resource
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
        'name' => $this->name,
        'description' => $this->description,
        'image' => $this->image,
        'date' => $this->date,
        'visibility' => $this->visibility,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
}
}
