<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Izinkan user melakukan update profil.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validasi.
     */
public function rules(): array
{
    return [
        'name' => [
            'required',
            'string',
            'max:255',
        ],

        'email' => [
            'required',
            'email',
            'max:255',
            'unique:users,email,' . $this->user()->id,
        ],

        'telepon' => [
            'required',
            'string',
            'max:20',
        ],

        'password' => [
            'nullable',
            'min:8',
        ],

        'password_confirmation' => [
            'nullable',
        ],
    ];
}
}