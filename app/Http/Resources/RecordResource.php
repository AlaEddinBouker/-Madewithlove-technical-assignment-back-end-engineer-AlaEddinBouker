<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
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
            'slug'=>$this->slug,
            'name'=>$this->name,
            'occurence'=>$this->occurence,
            'updated_at'=>$this->updated_at->format('d/m/Y'),
            'created_at'=>$this->created_at->format('d/m/Y'),
        ];
    }
}
