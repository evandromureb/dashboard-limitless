
<div class="navbar navbar-expand-lg navbar-dark navbar-static">
	<div class="d-flex flex-1 d-lg-none">
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="navbar-brand text-center text-lg-left">
		<a href="index.html" class="d-inline-block">
			<img src="{{ asset('images/logo.png') }}" class="d-none d-sm-block" alt="">
			<img src="{{ asset('images/logo.png') }}" class="d-sm-none" alt="">
		</a>
	</div>

	<div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
		<i class="my-3 my-lg-0 ml-lg-3">&nbsp;</i>
	</div>

	<ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">

		<li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
			<a href="#"
			   class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
			   data-toggle="dropdown">
				@if(Auth::user()->avatar)
					<img src="{{ asset('storage/avatar/default.png') }}" class="rounded-pill mr-lg-2" height="34" alt="">
				@else
					<img src="{{ asset('images/svg/avatars/004-boy-1.svg') }}" class="rounded-pill mr-lg-2" height="34" alt="">
				@endif

				<span class="d-none d-lg-inline-block">
					{{ auth()->user()->name }}
				</span>
			</a>

			<div class="dropdown-menu dropdown-menu-right">

				<a href="javascript:" class="dropdown-item">
					<i class="icon-user-plus"></i>
					Meu perfil
				</a>

				<div class="dropdown-divider"></div>

				<a href="javascript:" class="dropdown-item">
					<i class="icon-switch2"></i>
					Sair
				</a>

			</div>
		</li>
	</ul>
</div>
