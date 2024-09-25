<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
            'priority' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'status' => 'required',
            'type' => 'required',
        ];

        if (!$this['id']) {
            $rule['image_url'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        }

        if ($this->hasFile('image_url')) {
            $rule['image_url'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000';
        }

        return $rule;
    }
}
