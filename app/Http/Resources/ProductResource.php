<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => (float) $this->price,
            'discountPercentage' => (float) $this->discount_percentage,
            'rating' => (float) $this->rating,
            'stock' => (int) $this->stock,
            'brand' => $this->brand,
            'category' => $this->category->name,
            'thumbnail' => $this->thumbnail,
            'images' => $this->images,
        ];
    }
}
