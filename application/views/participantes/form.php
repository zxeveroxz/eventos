<?= $TOP ?>

<body>
    <div class="container-fluid">
        <div id="principal" class="card fade ">
            <div class="card-header bg-primary text-white py-2 ">
                <h5>PARTICIPANTES <strong class="float-right" id="id"></strong></h5>
            </div>
            <div class="card-body">

                <?= form_open(base_url("$ORG/participantes/save"), ['class' => '', 'id' => 'formy', 'method' => 'POST', 'autocomplete' => 'off']);
                ?>
                <input type="hidden" id="idx" value="0">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="usuario">Documento</label>
                            <div class="input-group">
                                <select class="form-control formy" id="tip_doc" style="width: 25%">
                                    <option value="dni">DNI</option>
                                    <option value="ruc">RUC</option>
                                    <option value="cedula">CEDULA</option>
                                    <option value="otro">OTRO</option>
                                </select>
                                <input type="text" class="form-control formy" id="nro_doc" style="width: 50%">
                                <button id="consultar" type="button" class="btn btn-info" style="width: 25%"><span class="d-none d-sm-block">Consultar</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2 col-6">
                        <div class="form-group text-center">
                            <label for="estado">Estado</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input formy" checked id="estado" value="">
                                <label class="custom-control-label" for="estado"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-6">
                        <div class="form-group">
                            <label for="usuario">Fecha</label>
                            <input type="text" class="form-control " disabled="true" id="fecha">
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Apellido Paterno</label>
                        <input type="text" class="form-control formy" id="pat" placeholder="Paterno">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido Materno</label>
                        <input type="text" class="form-control formy" id="mat" placeholder="Materno">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombres </label>
                        <input type="text" class="form-control formy" id="nombres" placeholder="Nombres">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Correo </label>
                        <input type="mail" class="form-control formy" id="correo" placeholder="Correo Electronico">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Telefono Fijo </label>
                        <input type="text" class="form-control formy" id="fijo" placeholder="Telefono Fijo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombre">Telefono Celular </label>
                        <input type="mail" class="form-control formy" id="telefono" placeholder="Telefono Celular">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombre">Telefono Celular 2</label>
                        <input type="mail" class="form-control formy" id="telefono2" placeholder="Telefono Celular 2">
                    </div>
                </div>

                <div class="form-group ">
                        <label for="nombre">Direccion </label>
                        <input type="text" class="form-control formy" id="direccion" placeholder="">
                </div>

                
                <hr/>
                <button id="submit" type="button" class="btn btn-md btn-primary mr-2 " onclick="emitir();">Guardar</button>
                <button type="button" class="btn btn-md btn-danger float-right" onclick="cancelar();">Cancelar/Cerrar</button>
                <?= form_close() ?>

            </div>
        </div>
    </div>
    <script>
        let btn_submit = $("#submit");

        let llenar = (row) => {
            $("#id").html("NUEVO");
            $("#fecha").val(new Date().toLocaleString());
            if (row == null) return;

            $("#id").html("EDITAR: " + row.idx);
            $("#submit").html("Actualizar");
            $("#idx").val(row.idx);
            $("#tip_doc").val(row.tip_doc);
            $("#nro_doc").val(row.nro_doc);
            $("#pat").val(row.pat);
            $("#mat").val(row.mat);
            $("#nombres").val(row.nombres);
            $("#correo").val(row.correo);
            $("#fijo").val(row.fijo);
            $("#telefono").val(row.telefono);
            $("#telefono2").val(row.telefono2);
            $("#direccion").val(row.direccion);
            $("#fecha").val(row.fecha);
            $("#estado").prop("checked", row.estado != 0 ? true : false);

        };

        llenar(<?= ($PAR) ?>);



        let cancelar = () => {
            window.parent.closeModal();
        };

        let formDATOS = () => {
            let formData = new FormData();
            $(".formy, input[type='hidden'] ").each((i, v) => {
                $input = $(v);
                let valor = $input.hasClass('numero') ? $input.val().replace(/,/g, '') : $input.val();
                if ($input.attr('type') == 'checkbox') {
                    valor = $input.is(":checked") ? 1 : 0;
                }
                formData.append($input.attr('id'), valor);
                /*console.log($input.attr('id'), valor);*/
            });
            return formData;
        };

        let emitir = async () => {
            btn_submit.attr("disabled", true).html("Procesando....");
            await fetch($("#formy").attr("action"), {
                    method: 'POST',
                    body: await formDATOS()
                })
                .then((response) => {
                    if (response.status != 200) {
                        alert("Se produjo el siguiente error: " + response.statusText);
                        cancelar();
                        return false;
                    } else
                        return response.json();
                })
                .then((data) => {
                    if (data.RESP > 0) {
                        toast("Operacion realizada con exito");
                        if ($("#idx").val() == 0) {
                            cancelar();
                        }
                    } else
                        toast("Error: No se realizo ningun cambio<hr>" + data.RESP, "error");
                    $("#" + data.TOKEN_NAME).val(data.TOKEN_HASH);
                    btn_submit.attr("disabled", false).html("Guardar");

                })
                .catch((e) => {
                    console.log('catch', e);

                });
        };

        const toast = (contenido, tipo = "ok", tiempo = 3000) => {
            parent.toast(contenido, tipo, tiempo);
        };

        $(document).ready(function() {


            $("#formy").submit((e) => {
                e.preventDefault();
            });


            /*cambiar el tamaño del modal */
            parent.$(".lloader").remove();
            let principal = $("#principal");
            principal.removeClass('fade');
            parent.$("#info").attr('height', principal.height() + 10);

        });
    </script>


</body>