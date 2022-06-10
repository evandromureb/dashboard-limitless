
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

	<div class="sidebar-content">

		<div class="sidebar-section sidebar-user my-1">
			<div class="sidebar-section-body">
				<div class="media">
					<a href="{{ route('profile') }}" class="mr-3">
						@if(Auth::user()->avatar)
							<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-circle" alt="">
						@else
							<img src="{{ asset('images/svg/avatars/004-boy-1.svg') }}" class="rounded-circle" alt="">
						@endif
					</a>

					<div class="media-body">
						<div class="font-weight-semibold">
							{{ auth()->user()->name }}
						</div>
						<div class="font-size-sm line-height-sm opacity-50">
							@if(auth()->user()->is_admin)
								Administrator
							@else
								Usuário
							@endif
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<button type="button"
								class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
							<i class="icon-transmission"></i>
						</button>

						<button type="button"
								class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
							<i class="icon-cross2"></i>
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="sidebar-section">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				{{--<li class="nav-item-header">

					<div class="text-uppercase font-size-xs line-height-xs">
						TITLE
					</div>
					<i class="icon-menu" title="title"></i>
				</li>--}}

				<li class="nav-item">
					<a href="{{ route('dashboard')}}" class="nav-link">
						<i class="icon-home4"></i>
						<span class="text-uppercase">
							Dashboard
						</span>
					</a>
				</li>

				{{--<li class="nav-item nav-item-submenu">

					<a href="javascript:" class="nav-link">
						<i class="icon-copy"></i>
						<span>
							Menu 02
						</span>
					</a>

					<ul class="nav nav-group-sub" data-submenu-title="Layouts">

						<li class="nav-item">
							<a href="{{ url('') }}" class="nav-link">
								Menu 02.01
							</a>
						</li>

					</ul>
				</li>--}}

				@if(auth()->user()->is_admin)
					<li class="nav-item">
						<a href="{{ route('user') }}" class="nav-link">
							<i class="icon-users"></i>
							<span class="text-uppercase">
								Gerenciamento de usuários
							</span>
						</a>
					</li>
				@endif


			</ul>
		</div>

	</div>

</div>
