<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePollRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:polls|max:255|alpha_dash',
            'description' => 'nullable|string',
            'choice_title' => 'required|array',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }
}
