<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaintainRequest extends FormRequest
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
        foreach (['is_maintenance', 'is_update', 'is_force_update', 'is_device'] as $value) {
            if ($this[$value] == null) {
                $this[$value] = 0;
            } else {
                $this[$value] = 1;
            }
        }

        $rule = [
            'site_name' => [
                'max:200',
            ],
            'maintenance_co' => [
                'max:200',
            ],
            'maintenance_lin' => [
                'max:200',
            ],
            'ios_app_version' => [
                'max:10',
            ],
            'android_app_ver' => [
                'max:10',
            ],
            'is_maintenance' => [
                'required',
            ],
            'started_at' => [
                'required',
            ],
            'ended_at'         => [
                'required',
            ],
            'is_update'         => [
                'required',
            ],
            'is_force_update'         => [
                'required',
            ],
            'is_device'         => [
                'required',
            ],
        ];

        return $rule;
    }
}
