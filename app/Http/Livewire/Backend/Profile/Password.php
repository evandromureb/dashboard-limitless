<?php

namespace App\Http\Livewire\Backend\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Password extends Component
{
    use LivewireAlert;

    public $oldPassword;
    public $password;
    public $password_confirmation;

    public function save()
    {
        $validated = $this->validate([
            'oldPassword' => 'required|min:6|max:16',
            'password' => ['required', 'min:6', 'max:16', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
        ]);

        if (Hash::check($this->oldPassword, Auth::user()->password)) {
            Auth::user()->update([
                'password' => Hash::make($this->password),
            ]);

            $this->alert(
                'info',
                'A sua senha foi alterada com sucesso',
                [
                    'position' => 'top-end',
                    'showCancelButton' => true,
                    'cancelButtonText' => 'Fechar',
                    'timer' => 10000,
                ]
            );
            $this->reset();
        } else {
            $this->alert(
                'error',
                'A senha informada não confere com a cadastrada',
                [
                    'position' => 'top-end',
                    'showCancelButton' => true,
                    'cancelButtonText' => 'Fechar',
                    'timer' => 10000,
                ]
            );
            $this->reset();
        }
    }


    public function render()
    {
        return view('livewire.backend.profile.password');
    }
}
