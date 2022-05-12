<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FullNameRule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200', new FullNameRule],
			'email' => ['required', 'email', 'unique:users'],
			'password' => ['required', 'max:16', 'confirmed', Password::min(8)
				->letters()
				->mixedCase()
				->numbers()
				->symbols()
				->uncompromised()
			],
			'accepted' => ['accepted'],
        ];
    }

	public function messages()
	{
		return [
			'name.required' => 'O nome é obrigatório',
			'name.string' => 'O nome deve ser um texto',
			'name.max' => 'O nome deve ter no máximo 200 caracteres',
			'email.required' => 'O e-mail é obrigatório',
			'email.email' => 'O e-mail deve ser válido',
			'email.unique' => 'Este e-mail já está sendo usado',
			'password.required' => 'A senha é obrigatória',
			'password.max' => 'A senha deve ter no máximo 16 caracteres',
			'password.confirmed' => 'As senhas não conferem',
			'acepted.accepted' => 'Você deve aceitar os termos de uso',

		];
	}

}
