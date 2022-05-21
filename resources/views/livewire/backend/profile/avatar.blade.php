<div>

<form wire:submit.prevent="save">

	<div class="card border-secondary">
		<div class="card-header bg-light border-secondary header-elements-inline">
			<h6 class="card-title font-weight-bold">
				<i class="icon-image2 mr-2 text-gray-500"></i>
				Foto do perfil
			</h6>
		</div>

		<div class="card-body text-center">
			<div class="card-img-actions d-inline-block mb-3">

				@if ($avatar)
					<img class="img-fluid rounded-circle" src="{{ $avatar->temporaryUrl() }}" width="170" height="170" alt="">
				@else
					<img class="img-fluid rounded-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}" width="170" height="170" alt="">
				@endif

			</div>

			<span class="d-block text-muted">

				<input type="file" class="form form-control p-1 font-weight-bold @error('avatar') is-invalid @enderror" wire:model="avatar">

				@error('avatar')
					<label id="basic-error" class="validation-invalid-label float-left" for="basic">
						{{ $message }}
					</label>
				@enderror
			</span>

		</div>

		<div class="card-footer fab-menu-top-right">
			<button class="btn btn-secondary btn-sm float-right">
				Upload
			</button>
		</div>

	</div>

</form>

	<div>
		@if (session()->has('message'))
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		@endif
	</div>
</div>
