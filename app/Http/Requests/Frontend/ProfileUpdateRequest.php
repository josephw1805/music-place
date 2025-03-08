<?php

namespace App\Http\Requests\Frontend;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:255', 'string'],
            'headline' => ['max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'bio' => ['max:6000'],
            'gender' => ['in:male,female'],
            'facebook' => ['url', 'max:255'],
            'x' => ['url', 'max:255'],
            'instagram' => ['url', 'max:255'],
            'website' => ['url', 'max:255'],
            'image' => ['nullable', 'image', 'max:2000'],
        ];
    }
}
