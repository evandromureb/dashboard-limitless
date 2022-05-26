<div>
	<div class="row d-flex justify-content-center">
		<div class="col-lg-8 ">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Bordered table</h5>
				</div>

				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>

									<td class="text-center">
										Avatar
									</td>

									<td>
										Nome
									</td>

									<td class="text-center">
										E-mail
									</td>

									<td class="text-center">
										Ativo
									</td>

									<td class="text-center">
										Administrador
									</td>

									<td class="text-center">
										Ações
									</td>

								</tr>
							</thead>

							<tbody>

							@foreach($users as $user)

								<tr>

									<td class="text-center" style="max-width: 10px;">
										@if($user->avatar == null)
											<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-pill mr-lg-2 img-thumbnail h-sm-auto">
										@else
											<img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-pill mr-lg-2 img-thumbnail h-sm-auto">
										@endif
									</td>

									<td>
										{{ $user->name }}
									</td>

									<td class="text-center">
										{{ $user->email }}
									</td>

									<td class="text-center">
										@if($user->is_active)
											<span class="badge badge-flat border-info text-info text-uppercase">
												Sim
											</span>
										@else
											<span class="badge badge-flat border-warning text-warning text-uppercase">
												Não
											</span>
										@endif
									</td>

									<td class="text-center">
										@if($user->is_admin)
											<span class="badge badge-flat border-info text-info text-uppercase">
												Sim
											</span>
										@else
											<span class="badge badge-flat border-warning text-warning text-uppercase">
												Não
											</span>
										@endif
									</td>

									<td class="text-center">

										@if(auth()->user()->id != $user->id)
											<div class="btn-group">

												<button
													class="btn btn-sm btn-secondary-100 text-secondary border-secondary"
													data-toggle="modal"
													data-target="#showModal"
													wire:click="show({{ $user->id }})"
												>
													<i class="icon-display"></i>
												</button>

												<button
													class="btn btn-sm btn-warning-100 text-warning border-warning"
													data-toggle="modal"
													data-target="#editModal"
													wire:click="edit({{ $user->id }})"
												>
													<i class="icon-pencil5"></i>
												</button>

												@if(!$user->deleted_at)

													<button
														class="btn btn-sm btn-danger-100 text-danger border-danger"
														data-toggle="modal"
														data-target="#deleteModal"
														wire:click="delete({{ $user->id }})"
													>
														<i class="icon-trash"></i>
													</button>

												@else

													<button
														class="btn btn-sm btn-success-100 text-success border-success"
														data-toggle="modal"
														data-target="#restoreModal"
														wire:click="restore({{ $user->id }})"
													>
														<i class="icon-import"></i>
													</button>

												@endif


											</div>
										@else
											Você não pode editar suas qualificações
										@endif

									</td>

								</tr>

							@endforeach

							</tbody>
						</table>
					</div>

				</div>


				<div class="card-footer">
					<div class="float-right">
						{{ $users->links() }}
					</div>
				</div>

			</div>
		</div>
	</div>

	{{--Start modal show--}}

	<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal" data-backdrop="static" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">

				<div class="modal-header bg-dark-100">
					<h6 class="modal-title font-weight-semibold">
						Informações do usuário: <span class="text-danger">{{ $name }}</span>
					</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="card card-body border-top-warning">

						<div class="text-center p-2">
							@if($avatar == null)
								<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@else
								<img src="{{ asset('storage/' . $avatar) }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@endif
							<hr>
						</div>

						<div class="list-feed">

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Nome completo:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $name }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									E-mail:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $email }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Ativo:
								</span>
								@if($is_active)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Administrador:
								</span>
								@if($is_admin)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Data criação:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($created_at)) }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Última atualização:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($updated_at)) }}
								</span>
							</div>

							@if($deleted_at)

								<div class="list-feed-item">
									<span class="font-weight-semibold text-secondary">
										Data da exclusão:
									</span>
										<span class="font-weight-semibold text-warning">
										{{ date('d/m/Y', strtotime($deleted_at)) }}
									</span>
								</div>

							@endif

						</div>
					</div>
				</div>

				<div class="modal-footer bg-dark-100">
					<button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">
						Fechar
					</button>
				</div>

			</div>
		</div>
	</div>

	{{--End modal show--}}

	{{--Start modal edit--}}

	<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" data-backdrop="static" aria-hidden="true">

		<form wire:submit.prevent="update">

			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content">

					<div class="modal-header bg-dark-100">
						<h6 class="modal-title font-weight-semibold">
							Editar usuário: <span class="text-danger">{{ $name }}</span>
						</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">

						@if ($errors->any())
							<div class="alert alert-danger border-0 alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="col-form-label col-sm- font-weight-semibold">
									Nome completo
								</label>
							</div>
							<div class="col-sm-9">
								<input
									wire:model.lazy="name"
									type="text"
									class="form-control @error('name') is-invalid bg-danger-100 @enderror"
									value="{{ $name }}"
								>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="col-form-label col-sm- font-weight-semibold">
									E-mail
								</label>
							</div>
							<div class="col-sm-9">
								<input
									wire:model.lazy="email"
									type="text"
									class="form-control @error('email') is-invalid bg-danger-100 @enderror"
									value="{{ $email }}"
								>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="col-form-label col-sm- font-weight-semibold">
									Administrador
								</label>
							</div>
							<div class="col-sm-9">

								<div class="border p-3 rounded">
									<div class="custom-control custom-radio custom-control-inline">
										<input
											type="radio"
											class="custom-control-input"
											id="is_admin_1"
											wire:model="is_admin"
											@if($is_admin) checked="" @endif
											value="1"
										>
										<label class="custom-control-label text-uppercase" for="is_admin_1">
											Sim
										</label>
									</div>

									<div class="custom-control custom-radio custom-control-inline">
										<input
											type="radio"
											class="custom-control-input"
											id="is_admin_0"
											wire:model="is_admin"
											@if(!$is_admin) checked="" @endif
											value="0"
										>
										<label class="custom-control-label text-uppercase" for="is_admin_0">
											Não
										</label>
									</div>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="col-form-label col-sm- font-weight-semibold">
									Ativo
								</label>
							</div>
							<div class="col-sm-9">

								<div class="border p-3 rounded">
									<div class="custom-control custom-radio custom-control-inline">
										<input
											type="radio"
											class="custom-control-input"
											id="is_active_1"
											wire:model="is_active"
											@if($is_active) checked="" @endif
											value="1"
										>
										<label class="custom-control-label text-uppercase" for="is_active_1">
											Sim
										</label>
									</div>

									<div class="custom-control custom-radio custom-control-inline">
										<input
											type="radio"
											class="custom-control-input"
											id="is_active_0"
											wire:model="is_active"
											@if(!$is_active) checked="" @endif
											value="0"
										>
										<label class="custom-control-label text-uppercase" for="is_active_0">
											Não
										</label>
									</div>
								</div>

							</div>
						</div>

					</div>

					<div class="modal-footer bg-dark-100">

						<button
							wire:click.prevent="update()"
							class="btn btn-info text-uppercase float-left"
						>
							Salvar
						</button>

						<button type="button" class="btn btn-secondary text-uppercase float-right" data-dismiss="modal">
							Fechar
						</button>
					</div>

				</div>
			</div>

		</form>

	</div>

	{{--End modal edit--}}

	{{--Start modal delete--}}

	<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" data-backdrop="static" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">

				<div class="modal-header bg-dark-100">
					<h6 class="modal-title font-weight-semibold">
						Excluir usuário: <span class="text-danger">{{ $name }}</span>
					</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="card card-body border-top-warning">

						<div class="text-center p-2">
							@if($avatar == null)
								<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@else
								<img src="{{ asset('storage/' . $avatar) }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@endif
							<hr>
						</div>

						<div class="list-feed">

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Nome completo:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $name }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									E-mail:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $email }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Ativo:
								</span>
								@if($is_active)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Administrador:
								</span>
								@if($is_admin)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Data criação:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($created_at)) }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Última atualização:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($updated_at)) }}
								</span>
							</div>

							@if($deleted_at)

								<div class="list-feed-item">
									<span class="font-weight-semibold text-secondary">
										Data da exclusão:
									</span>
									<span class="font-weight-semibold text-warning">
										{{ date('d/m/Y', strtotime($deleted_at)) }}
									</span>
								</div>

							@endif

						</div>
					</div>
					<h5 class="font-weight-semibold">
						Você realmente deseja excluir este usuário?
					</h5>
				</div>

				<div class="modal-footer bg-dark-100">

					<button type="button" class="btn btn-danger text-uppercase float-start" wire:click="deleted({{ $idUser }})">
						Excluir
					</button>

					<button type="button" class="btn btn-secondary text-uppercase float-end" data-dismiss="modal">
						Fechar
					</button>
				</div>

			</div>
		</div>
	</div>

	{{--End modal delete--}}

	{{--Start modal restore--}}

	<div wire:ignore.self class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restoreModal" data-backdrop="static" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">

				<div class="modal-header bg-dark-100">
					<h6 class="modal-title font-weight-semibold">
						Restaurar usuário: <span class="text-danger">{{ $name }}</span>
					</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="card card-body border-top-warning">

						<div class="text-center p-2">
							@if($avatar == null)
								<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@else
								<img src="{{ asset('storage/' . $avatar) }}" class="rounded-pill mr-lg-2 img-thumbnail " style="max-width: 100px">
							@endif
							<hr>
						</div>

						<div class="list-feed">

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Nome completo:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $name }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									E-mail:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ $email }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Ativo:
								</span>
								@if($is_active)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Administrador:
								</span>
								@if($is_admin)
									<span class="badge badge-flat border-info text-info text-uppercase">
										Sim
									</span>
								@else
									<span class="badge badge-flat border-warning text-warning text-uppercase">
										Não
									</span>
								@endif
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Data criação:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($created_at)) }}
								</span>
							</div>

							<div class="list-feed-item">
								<span class="font-weight-semibold text-secondary">
									Última atualização:
								</span>
								<span class="font-weight-semibold text-warning">
									{{ date('d/m/Y', strtotime($updated_at)) }}
								</span>
							</div>

							@if($deleted_at)

								<div class="list-feed-item">
									<span class="font-weight-semibold text-secondary">
										Data da exclusão:
									</span>
									<span class="font-weight-semibold text-warning">
										{{ date('d/m/Y', strtotime($deleted_at)) }}
									</span>
								</div>

							@endif

						</div>
					</div>
					<h5 class="font-weight-semibold">
						Você realmente deseja restaurar este usuário?
					</h5>
				</div>

				<div class="modal-footer bg-dark-100">

					<button type="button" class="btn btn-danger text-uppercase float-start" wire:click="restored({{ $idUser }})">
						Restaurar
					</button>

					<button type="button" class="btn btn-secondary text-uppercase float-end" data-dismiss="modal">
						Fechar
					</button>
				</div>

			</div>
		</div>
	</div>

	{{--End modal restore--}}


</div>

@section('localScripts')
	<script type="text/javascript">
		window.livewire.on('userUpdate', () => {
			$('#editModal').modal('hide');
		});
		window.livewire.on('userDelete', () => {
			$('#deleteModal').modal('hide');
		});
		window.livewire.on('userRestore', () => {
			$('#restoreModal').modal('hide');
		});
	</script>
@endsection
