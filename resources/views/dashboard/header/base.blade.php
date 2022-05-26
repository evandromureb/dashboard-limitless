<div class="card border-bottom-0 rounded-0">
	<div class="page-header page-header-light">
		<div class="page-header-content">
			<div class="page-title">
				<h5>
					<i class="icon-arrow-left52 mr-2"></i>
					<span class="font-weight-semibold">

						@if(route('dashboard') == url()->current())
							Dashboard
						@endif

						@if(route('user') == url()->current())
							Gerenciamento de usuários
						@endif

					</span>
				</h5>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
			<div class="breadcrumb breadcrumb-arrow">

				@if(route('dashboard') == url()->current())
					<a href="{{ route('dashboard') }}" class="breadcrumb-item">
						<i class="icon-home2 mr-2"></i>
						Dashboard
					</a>
				@endif

				@if(route('user') == url()->current())
					<a href="{{ route('dashboard') }}" class="breadcrumb-item">
						<i class="icon-home2 mr-2"></i>
						Dashboard
					</a>

					<a href="{{ route('user') }}" class="breadcrumb-item">
						Gerenciamento de usuários
					</a>
				@endif

			</div>

			<div class="header-elements">
				<div class="breadcrumb">

					@if(route('user') == url()->current())

						<a
							href="javascript:"
							class="breadcrumb-elements-item"
							data-toggle="modal"
							data-target="#registerModal"
							wire:click="register()"
						>
							<i class="icon-plus-circle2"></i>
							&nbsp;
							Cadastrar
						</a>

					@endif

				</div>
			</div>
		</div>
	</div>
</div>
