<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBrandRequest extends FormRequest
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
        $currentId = is_null($this->brand) ? '' : $this->brand->id;
        return [
            'title' => 'required|min:2|max:64|unique:brands,title,'. $currentId
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название брэнда',
        ];
    }
}
