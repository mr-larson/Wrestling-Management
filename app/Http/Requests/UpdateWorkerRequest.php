<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
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
            'lastname' => 'nullable|required_if:first_name,null|string|max:255',
            'firstname' => 'nullable|required_if:last_name,null|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'gender' => 'nullable',
            'age' => 'nullable|integer',
            'style' => 'nullable',
            'status' => 'nullable',
            'category' => 'nullable',
            'height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'image' => 'nullable|image',
            'overall' => 'nullable|integer',
            'popularity' => 'nullable|integer',
            'endurance' => 'nullable|integer',
            'promo_skill' => 'nullable|integer',
            'user_id' => 'required|exists:users,id',
            'promotion_id' => 'nullable|exists:promotions,id',
        ];
    }
}
