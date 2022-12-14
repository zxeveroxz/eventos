<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">

		<li class="nav-item nav-category">Menu Principal</li>
		<li class="nav-item">
			<a class="nav-link" href="index.html">
				<i class="menu-icon typcn typcn-document-text"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url("$ORG/participantes"); ?>">
				<i class="menu-icon typcn typcn-shopping-bag"></i>
				<span class="menu-title">Participantes</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url("$ORG/matriculas"); ?>">
				<i class="menu-icon typcn typcn-th-large-outline"></i>
				<span class="menu-title">Matriculas</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="http://10.0.0.24:3000/actualizar" target="_black">
				<i class="menu-icon typcn typcn-th-large-outline"></i>
				<span class="menu-title">SINCRONIZAR</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
				<i class="menu-icon typcn typcn-document-add"></i>
				<span class="menu-title">Configuracion</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="auth">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url("$ORG/usuarios"); ?>"> Usuarios </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url("$ORG/expositores"); ?>"> Expositores </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url("$ORG/eventos"); ?>"> Eventos </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url("$ORG/eventos_aperturas"); ?>"> Eventos - Aperturas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/samples/login.html"> Login </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/samples/register.html"> Register </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
					</li>
				</ul>
			</div>

		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
				<i class="menu-icon typcn typcn-coffee"></i>
				<span class="menu-title">Menu</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="ui-basic">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
					</li>
				</ul>
			</div>
		</li>
		</li>
	</ul>
</nav>