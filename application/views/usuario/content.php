<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>


<div class="content-wrapper">
	<div class="row ">
		<div class="col-12">
			<div class="page-header bg-white py-1">
				<h3 class="page-title">USUARIOS</h3>
				<ul class="quick-links ml-auto ">
					<li style="border: none;"><button class="btn btn-primary agregar">Agregar</button></li>
					<li><button class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i></button></li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="card">
				<div class="card-body">
					<table id="table" class="table-striped" data-toggle="table" data-url="<?= base_url("$ORG/usuarios/get") ?>" data-height="450">
						<thead>
							<tr>
								<th data-field="idx" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center" data-width="35">-</th>
								<th data-field="idx" data-width="100" data-halign="center" data-align="center">ID</th>
								<th data-field="usuario" data-width="100" data-halign="center" data-align="center">USUARIO</th>
								<th data-field="nombre" data-halign="center">NOMBRES</th>
								<th data-field="correo" data-halign="center">CORREO</th>
								<th data-field="nivel" data-width="80" data-halign="center" data-align="center">NIVEL</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
	<div class="modal-dialog  modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				...
			</div>
		</div>
	</div>
</div>

<script>
	var $table = $('#table')

	function operateFormatter(value, row, index) {
		return [
			'<a class="editar" href="javascript:void(0)" title="Editar ' + row.usuario + '">',
			'<i class="fa fa-pencil-square-o" ></i> Editar',
			'</a>'
		].join('')
	}


	window.operateEvents = {
		'click .editar': function(e, value, row, index) {
			$('#modalForm .modal-content').prepend('<div class="lloader d-flex justify-content-center pt-5"><div class=" spinner-border text-primary" role="status"></div></div>');
			$('#modalForm')
				.removeData('bs.modal')
				.modal('show')
				.find('.modal-body')
				.html('<iframe src="<?= base_url("$ORG/usuarios/form/") ?>' + row.idx + '" style="border:none" id="info" height="70px" width="100%"></iframe>');
		}
	};

	$('.modal').on('hidden.bs.modal', function(event) {
		//console.log(event);
	});

	$(".agregar").on("click", function() {
		$('#modalForm .modal-content').prepend('<div class="lloader d-flex justify-content-center pt-5"><div class=" spinner-border text-primary" role="status"></div></div>');
		$('#modalForm')
			.removeData('bs.modal')
			.modal('show')
			.find('.modal-body')
			.html('<iframe src="<?= base_url("$ORG/usuarios/form/0") ?>" style="border:none" id="info" height="70px" width="100%"></iframe>');
	});
</script>
