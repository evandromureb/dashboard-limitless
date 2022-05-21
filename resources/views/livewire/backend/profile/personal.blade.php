<div>

	<form wire:submit.prevent="save">

		<div class="card border-secondary">
			<div class="card-header bg-light border-secondary header-elements-inline">
				<h6 class="card-title font-weight-bold">
					<i class="icon-user mr-2 text-gray-500"></i>
					Dados pessoais
				</h6>
			</div>

			<div class="card-body font-weight-bold">

				<div class="form-group row">
					<label class="col-form-label col-lg-3">
						Nome completo
					</label>
					<div class="col-lg-9">
						<input
							wire:model.lazy="name"
							type="text"
							class="form-control @error('name') is-invalid @enderror"
						>
						@error('name')
							<label id="basic-error" class="validation-invalid-label float-left" for="basic">
								{{ $message }}
							</label>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-lg-3">
						E-mail
					</label>
					<div class="col-lg-9">
						<input
							wire:model.lazy="email"
							type="text"
							class="form-control @error('email') is-invalid @enderror"
						>
						@error('email')
							<label id="basic-error" class="validation-invalid-label float-left" for="basic">
								{{ $message }}
							</label>
						@enderror
					</div>
				</div>

			</div>

			<div class="card-footer fab-menu-top-right">
				<button class="btn btn-secondary btn-sm float-right">
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
