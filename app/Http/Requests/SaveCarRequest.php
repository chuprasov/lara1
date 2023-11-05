<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentId = is_null($this->car) ? '' : $this->car->id;
        return [
            'brand_id' => 'required|integer',
            'model' => 'required|min:2|max:100',
            'transmission' => 'required|in:' . implode(',', array_keys(config('app-cars.transmissions'))),
            'vin' => 'required|min:3|max:17|unique:cars,vin,'. $currentId,
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    public function attributes(): array
    {
        return [
            'brand_id' => 'Марка',
            'model' => 'Модель',
            'transmission' => 'Трансмиссия',
            'vin' => 'VIN',
            'tags' => 'Тэги',
            'tags.*' => 'Тэг'
        ];
    }

}
