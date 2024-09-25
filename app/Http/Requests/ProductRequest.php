<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'vending_machine_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'price' => 'required|integer',
            'priority' => 'required|integer',
            'quantity' => 'required|integer|between:1,100',
            'type' => 'required',
            'desc' => 'required',
            'capacity' => 'required',
        ];
        
        if(!empty($this['id'])) {
            $rule['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        } else {
            $rule['images'] = 'required|array';
            $rule['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        }

        return $rule;
    }
}
