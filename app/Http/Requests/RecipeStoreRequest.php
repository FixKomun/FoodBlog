<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'number_of_people' => ['required', 'numeric'],
            'prep_time' => ['required', 'numeric'],
            'cook_time' => ['required', 'numeric'],
            'image_path' => [''],
            'difficulty_id' => ['required'],
            'country_id' => ['required'],
            'type_of_meal_id' => ['required']
        ];
    }
}
