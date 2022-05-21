<div>

	<form wire:submit.prevent="save">

		<div class="card border-secondary">
			<div class="card-header bg-light border-secondary header-elements-inline">
				<h6 class="card-title font-weight-bold">
					<i class="icon-lock mr-2 text-gray-500"></i>
					Alterar sua senha
				</h6>
			</div>

			<div class="card-body font-weight-bold">

				<div class="form-group row pull-left">
					<label class="col-form-label col-lg-4">
						Senha atual
					</label>
					<div class="col-lg-8">
						<input
							wire:model.lazy="oldPassword"
							type="password"
							maxlength="16"
							class="form-control form-control-sm @error('oldPassword') is-invalid @enderror"
						>
						@error('oldPassword')
							<label id="basic-error" class="validation-invalid-label float-left" for="basic">
								{{ $message }}
							</label>
						@enderror
					</div>
				</div>

				<div class="form-group row pull-right">
					<label class="col-form-label col-lg-4">
						Nova senha
					</label>
					<div class="col-lg-8">
						<input
							wire:model.lazy="password"
							type="password"
							maxlength="16"
							class="form-control form-control-sm @error('password') is-invalid @enderror"
						>
						@error('password')
							<label id="basic-error" class="validation-invalid-label float-left" for="basic">
								{{ $message }}
							</label>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-lg-4">
						Confirmar nova senha
					</label>
					<div class="col-lg-8">
						<input
							wire:model.lazy="password_confirmation"
							type="password"
							maxlength="16"
							class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
						>
						@error('password_confirmation')
							<label id="basic-error" class="validation-invalid-label float-left" for="basic">
								{{ $message }}
							</label>
						@enderror
					</div>
				</div>

			</div>

			<div class="card-footer fab-menu-top-right">
				<button class="btn btn-secondary btn-sm float-right text-uppercase">
					Salvar
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
