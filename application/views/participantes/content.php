<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>


<div class="content-wrapper">
	<div class="row ">
		<div class="col-12">
			<div class="page-header bg-white py-1 px-2 border-bottom border-dark ">
				<h3 class="page-title">PARTICIPANTES</h3>
				<ul class="quick-links ml-auto ">
					<li style="border: none;"><button class="btn btn-primary" id="agregar">Agregar</button></li>
					<li><button class="btn btn-info" id="actualizar"><i class="fa fa-refresh" aria-hidden="true"></i></button></li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="card">
				<div class="card-body">
					<table id="table" class="table-striped" data-toggle="table" data-url="<?= base_url("$ORG/participantes/get") ?>" data-height="450">
						<thead>
							<tr>
								<th data-field="idx"  data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center" data-width="35">-</th>
								
								<th data-field="nro_doc" data-width="100" data-halign="center">DOCUMENTO</th>
								<th data-field="pat" data-halign="center" data-formatter="unir_nombre">APELLIDOS Y NOMBRES</th>
                                <th data-field="telefono" data-width="100" data-halign="center">TELFONO</th>
                                <th data-field="correo" data-width="200" data-halign="center">CORREO</th>
								<th data-field="estado" data-width="80" data-halign="center" data-align="center">ESTADO</th>
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
	var $table = $('#table');

    function unir_nombre(value, row, index) {
		return [
			`${row.pat} ${row.mat} ${row.nombres}`
		].join('');
	};

	function operateFormatter(value, row, index) {
		return [
			'<a class="editar" href="javascript:void(0)" title="Editar ' + row.nombres + '">',
			'<i class="fa fa-pencil-square-o" ></i> Editar',
			'</a>'
		].join('');
	};


	window.operateEvents = {
		'click .editar': function(e, value, row, index) {
			$('#modalForm .modal-content').prepend('<div class="lloader d-flex  justify-content-center pt-5"><div class=" spinner-border text-primary" role="status"></div></div>');
			$('#modalForm')
				.removeData('bs.modal')
				.modal('show')
				.find('.modal-body')
				.html('<iframe src="<?= base_url("$ORG/participantes/form/") ?>' + row.idx + '" style="border:none" id="info" height="70px" width="100%"></iframe>');
		}
	};

	$('.modal').on('hidden.bs.modal', function(event) {
		/*console.log(event);*/
	});

	$("#agregar").on("click", function() {
		$('#modalForm .modal-content').prepend('<div class="lloader d-flex justify-content-center pt-5"><div class=" spinner-border text-primary" role="status"></div></div>');
		$('#modalForm')
			.removeData('bs.modal')
			.modal('show')
			.find('.modal-body')
			.html('<iframe src="<?= base_url("$ORG/participantes/form/0") ?>" style="border:none" id="info" height="70px" width="100%"></iframe>');
	});

	$("#actualizar").on("click",function(){
		$table.bootstrapTable('refresh');
	});
</script>
