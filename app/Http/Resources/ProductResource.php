<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name,
            'price'=> $this->price,
            'currency'=>$this->currency,
            'sku'=>$this->sku,
            'category'=> new CategoryResource($this->category) ,
            'is_digital'=>$this->is_digital,
            'download_url'=>$this->download_url,
            'weight'=>$this->weight         
        ];
    }
}
