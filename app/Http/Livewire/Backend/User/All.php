<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use App\Rules\FullNameRule;
use Illuminate\Validation\Rules\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
	use WithPagination;
	use LivewireAlert;

	public $idUser;
	public $name;
	public $email;
	public $is_active;
	public $is_admin;
	public $avatar;
	public $created_at;
	public $updated_at;
	public $deleted_at;
	public $password;

	protected $paginationTheme = 'bootstrap';

	public function show($id)
	{
		$this->populate($id);
	}

	public function register()
	{
		$this->reset();
		$this->is_admin = false;
		$this->is_active = true;
	}

	public function store()
	{
		$validatedData = $this->validate([
			'name' => ['required', 'string', 'max:200', new FullNameRule()],
			'email' => ['required', 'email', 'unique:users'],
			'password' => ['required', 'max:16', Password::min(8)
				->letters()
				->mixedCase()
				->numbers()
				->symbols()
				->uncompromised()
			],
			'is_active' => ['required', 'boolean'],
			'is_admin' => ['required', 'boolean'],
		]);

		User::create($validatedData);

		$this->resetFields();

		$this->emit('userRegister');

		$this->alertMessage('info', "O usuário {$validatedData['name']} foi cadastrado com sucesso.");

	}

	public function edit($id)
	{
		$this->populate($id);

	}

	public function update()
	{
		$validatedData = $this->validate([
			'name' => ['required', 'string', 'max:200', new FullNameRule()],
			'email' => ['required', 'email', 'max:200', 'unique:users,email,' . $this->idUser],
			'is_active' => ['required', 'boolean'],
			'is_admin' => ['required', 'boolean'],
		]);

		User::find($this->idUser)
			->update($validatedData);

		$this->resetFields();

		$this->emit('userUpdate');

		$this->alertMessage('info', "Os dados do usuário {$this->name} foram atualizados com sucesso.");

	}

	public function delete($id)
	{
		$this->populate($id);
	}

	public function deleted($id)
	{
		$user = User::find($this->idUser);
		$user->update([
			'is_active' => false,
			'is_admin' => false,
		]);
		$user->delete();

		$this->emit('userDelete');

		$this->alertMessage('info', "O usuário {$this->name} foi deletado com sucesso.");

	}

	public function restore($id)
	{
		$this->populate($id);
	}

	public function restored($id)
	{
		User::withTrashed()
			->find($this->idUser)
			->restore();

		$this->emit('userRestore');

		$this->alertMessage('info', "O usuário {$this->name} foi restaurado com sucesso.");

	}

	public function populate($id)
	{
		$this->resetFields();
		$user = User::withTrashed()
			->find($id);
		$this->idUser = $user->id;
		$this->name = $user->name;
		$this->email = $user->email;
		$this->is_active = $user->is_active;
		$this->is_admin = $user->is_admin;
		$this->avatar = $user->avatar;
		$this->created_at = $user->created_at;
		$this->updated_at = $user->updated_at;
		$this->deleted_at = $user->deleted_at;
	}

	public function resetFields()
	{
		$this->reset();
		$this->resetValidation();
	}

	public function alertMessage($type, $message)
	{
		$this->alert(
			$type,
			$message,
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
		$users = User::latest()
			->withTrashed()
			->paginate(10);

        return view('livewire.backend.user.all', [
			'users' => $users,
		]);
    }
}
