<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIndekosRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'owner' => ['required', 'string', 'max:255'],

            // array of room_name
            'room_name' => ['required', 'array'],
            'room_name.*' => ['required', 'string', 'max:255'],
            'price' => ['required', 'array'],
            'price.*' => ['required', 'numeric'],
            'room' => ['required', 'array'],
            'room.*' => ['required', 'numeric'],
            'available' => ['required', 'array'],
            'available.*' => ['required', 'numeric'],
            'room_type_id' => ['required', 'array'],
            'room_type_id.*' => ['required', 'numeric'],
        ];
    }
}
