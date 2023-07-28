<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'nullable|required_if:first_name,null|string|max:255',
            'first_name' => 'nullable|required_if:last_name,null|string|max:255',
            'gender' => 'nullable',
            'note' => 'nullable|text',
            'image' => 'nullable|image',
            'user_id' => 'required|exists:users,id',
            'promotion_id' => 'nullable|exists:promotions,id',
        ];
    }
}
