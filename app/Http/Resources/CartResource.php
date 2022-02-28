<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'rowId'=>$this->rowId,
            'slug'=>$this->id,
            'name'=>$this->name,
            'quantity'=>$this->qty,
            'price'=>$this->price,
        ];
    }
}
