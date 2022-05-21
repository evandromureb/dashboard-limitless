<?php

namespace App\Http\Livewire\Backend\Profile;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;
    use livewireAlert;

    public $avatar;

    public function save()
    {
        $this->validate([
            'avatar' => 'image|mimes:jpg,jpeg,png,webp|max:512'
        ]);

        $name = auth()->user()->id . "." . $this->avatar->getClientOriginalExtension();
        $this->avatar->storeAs('public/avatar', $name);

        Auth::user()->update([
            'avatar' => "avatar/" . $name
        ]);

        $this->alert(
            'info',
            'A sua imagem do perfil foi alterada com sucesso',
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
        return view('livewire.backend.profile.avatar');
    }
}
