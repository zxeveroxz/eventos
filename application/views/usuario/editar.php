<?= $TOP ?>

<body>
	<div class="container-fluid">
		<div id="principal" class="card ">
			<div class="card-header bg-primary text-white py-2 ">
				<h5>EDITAR USUARIO: <strong id="id"></strong> </h5>
			</div>
			<div class="card-body">

				<form <?php
						echo form_open(base_url("$ORG/usuarios/save"), ['class' => '', 'id' => 'formy', 'method' => 'POST']);
						?><input type="hidden" id="idx" value="">
					<div class="row">
						<div class="col-5">
							<div class="form-group">
								<label for="usuario">Nombre de Usuario</label>
								<input type="text" class="form-control text-primary formy" id="usuario" placeholder="Nombre de Usuario">
							</div>
						</div>
						<div class="col-2">
							<div class="form-group text-center">
								<label for="estado">Estado</label>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input formy" id="estado" value="">
									<label class="custom-control-label" for="estado"></label>
								</div>
							</div>
						</div>
						<div class="col-5">
							<div class="form-group">
								<label for="usuario">Creacion</label>
								<input type="text" class="form-control " disabled="true" id="fecha">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="nombre">Nombres</label>
						<input type="text" class="form-control formy" id="nombre" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="correo">Correo</label>
						<input type="email" class="form-control formy" id="correo" placeholder="Correo Electronico">
					</div>

					<div class="form-group">
						<label for="nivel">Nivel</label>
						<select class="custom-select formy" id="nivel">
							<option value="user">Usuario</option>
							<option value="admin">Admin</option>
						</select>
					</div>

					<div class="form-group">
						<label for="detalles">Detalles </label>
						<textarea class="form-control formy" id="detalles" rows="2"></textarea>
					</div>

					<button type="submit" class="btn btn-md btn-success mr-2 ">Guardar</button>
					<button class="btn btn-md btn-danger float-right" type="button" onclick="emitir()">Cancelar</button>
				</form>

			</div>
		</div>
	</div>
	<script>
		let llenar = (row) => {
			$("#id").html(row.idx);
			$("#idx").val(row.idx);
			$("#nombre").val(row.nombre);
			$("#usuario").val(row.usuario);
			$("#correo").val(row.correo);
			$("#nivel").val(row.nivel);
			$("#detalles").val(row.detalles);
			$("#fecha").val(row.fecha);
			if (row.estado != 0) {
				$("#estado").prop("checked", true);
			}
		}
		llenar(<?= ($USU) ?>);

		$(document).ready(function() {
			//cambiar el tamaño del modal 
			parent.$(".lloader").remove();
			let h = $("#principal").height();
			parent.$("#info").attr('height', h + 10);

		});

		let emitir = async () => {
			let formData = new FormData();

			$(".formy, input[type='hidden'] ").each((i, v) => {
				$input = $(v);
				let valor = $input.hasClass('numero') ? $input.val().replace(/,/g, '') : $input.val();
				if ($input.attr('type') == 'checkbox') {
					valor = $input.is(":checked") ? 1 : 0;
				}
				formData.append($input.attr('id'), valor);
				console.log($input.attr('id'), valor);
			});

			await fetch($("#formy").attr("action"), {
					method: 'POST',
					body: formData
				})
				.then((response) => {
					console.log(response);
				})
				.catch((e) => {
					//bootbox.alert("Se produjo un error, favor de refrescar la pagina o vuelva a ingresar");
					console.log(e);

					setTimeout(function() {
						//  $btn.attr('disabled', false);
					}, 2000);
				});
		}
	</script>




	<!-- plugins:js -->

	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="/eventos/public/assets/js/shared/off-canvas.js"></script>
	<script src="/eventos/public/assets/js/shared/misc.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="/eventos/public/assets/js/demo_1/dashboard.js"></script>

</body>
