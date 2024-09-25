<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $rule = [
            'name' => 'required',
            'post_code' => 'required|min:6|max:8',
            'pref21' => 'required',
            'addr21' => 'required',
            'strt21' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        return $rule;
    }
}
