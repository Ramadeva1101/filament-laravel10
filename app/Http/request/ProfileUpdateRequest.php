<?php

namespace App\Http\Requests;

use App\Models\Pengguna; // Mengubah referensi dari User ke Pengguna
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(Pengguna::class)->ignore($this->pengguna()->id)
            ],
        ];
    }

    /**
     * Overwrite the pengguna method to retrieve the current Pengguna instance.
     *
     * @return \App\Models\Pengguna
     */
    public function pengguna()
    {
        return $this->route('pengguna');
    }
}
