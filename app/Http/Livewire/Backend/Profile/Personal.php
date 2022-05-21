<?php

namespace App\Http\Livewire\Backend\Profile;

use App\Rules\FullNameRule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Personal extends Component
{
    use LivewireAlert;

    public $name;
    public $email;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:200', new FullNameRule()],
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        ]);

        Auth::user()->update($validatedData);

        $this->alert(
            'info',
            'Seus dados pessoais foram alterados com sucesso',
            [
                'position' => 'top-end',
                'showCancelButton' => true,
                'cancelButtonText' => 'Fechar',
                'timer' => 10000,
            ]
        );
    }

    public function render()
    {
        return view('livewire.backend.profile.personal');
    }
}
