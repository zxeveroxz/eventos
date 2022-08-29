<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 col-lg-12 pb-2 d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <h4 class="page-title">USUARIOS</h4>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">

                    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">

                    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>

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
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
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
            //alert('row: ' + JSON.stringify(row))
            $('#modalEditar').find('.modal-body').load('<?= base_url("$ORG/usuarios/editar/") ?>'+row.idx);
            $('#modalEditar').modal('show')
        }
    }
</script>