<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendingMachineRequest extends FormRequest
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
            'store_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|max:20',
            'post_code' => 'required|min:6|max:8',
            'pref21' => 'required',
            'addr21' => 'required',
            'strt21' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        if(!empty($this['id'])) {
            $rule['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
            $rule['icon'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        } else {
            $rule['images'] = 'required|array';
            $rule['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
            $rule['icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        }

        return $rule;
    }
}
