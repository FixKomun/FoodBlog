<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'number_of_people' => $this->number_of_people,
            'prep_time' => $this->prep_time,
            'cook_time' => $this->cook_time,
            'image_path' => $this->image_path,
            'difficulty' => $this->difficulty,
            'country' => $this->country,
            'typeOfMeal' => $this->typeOfMeal,
        ];
    }
}
