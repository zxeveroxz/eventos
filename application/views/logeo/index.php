<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link href="/eventos/public/bt4/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="/eventos/public/bt4/js/bootstrap.min.js"></script>
	<style>
		<?= $css; ?>
	</style>
</head>

<body>
	<section class="login-block">
		<div class="titulo container">
			<h1 class="text-center"><strong><?= $nombre ?></strong></h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 login-sec">
					<h2 class="text-center">IDENTIFICACION</h2>

					<?= form_open(base_url("$ORG/usuarios/validar"), ['class' => 'login-form', 'id' => 'login', 'method' => 'POST']); ?>
					<div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
						<input type="text" class="form-control" placeholder="" name="usu" value="<?= set_value('usu', "") ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Clave</label>
						<input type="password" class="form-control" placeholder="" name="pas">
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="recordar">
							<small>Recordar Datos</small>
						</label>
						<button type="submit" class="btn btn-login float-right">Iniciar</button>
					</div>
					<br />
					<?php
					$error = mensaje_error();
					if ($error) {
						echo "<p class='alert alert-danger'>$error</p>";
					} ?>

					<?= form_close() ?>
					<div class="copy-text">Creado por <a href="https://sergiozegarracorne.blogspot.com/">zxeveroxz</a></div>
				</div>
				<div class="col-md-8 banner-sec">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="https://via.placeholder.com/700x500.png?text=Primer banner" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="https://via.placeholder.com/700x500.png?text=segundo banner" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="https://via.placeholder.com/700x500.png?text=Tercer banner" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
	</section>

</body>

</html>