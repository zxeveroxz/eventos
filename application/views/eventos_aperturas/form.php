<?= $TOP ?>

<body>
    <div class="container-fluid">
        <div id="principal" class="card fade ">
            <div class="card-header bg-primary text-white py-2 ">
                <h5>EVENTOS APERTURAS <strong class="float-right" id="id"></strong></h5>
            </div>
            <div class="card-body">

                <?= form_open(base_url("$ORG/eventos_aperturas/save"), ['class' => '', 'id' => 'formy', 'method' => 'POST', 'autocomplete' => 'off']);
                ?>
                <input type="hidden" id="idx" value="0">

                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="evento">Listado de Evento</label>
                        <select class="form-control formy" id="evento">
                            <option value='-'>Seleccione</option>
                            <?php
                            foreach ($EVE as $e)
                                echo "<option value='$e->idx'>$e->nombre</option>\n";
                            ?>
                        </select>
                        <input type="hidden" class="formy" id="evento_nombre" >
                    </div>
                    <div class="form-group col-md-2">

                        <label for="turno">Turno</label>
                        <select class="form-control formy" id="turno">
                            <?php
                            $TURNO = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                            foreach ($TURNO as $t)
                                echo "<option value='$t'>$t</option>\n";
                            ?>
                        </select>

                    </div>
                    <div class="form-group col-md-1 col-6">
                        <div class="text-center">
                            <label for="estado">Estado</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input formy" checked id="estado" value="">
                                <label class="custom-control-label" for="estado"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-6">

                        <label for="usuario">Fecha</label>
                        <input type="text" class="form-control " disabled="true" id="fecha">

                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="expositor">Expositor</label>
                        <select class="form-control formy" id="expositor">
                            <option value='-'>Seleccione</option>
                            <?php
                            foreach ($EXP as $e)
                                echo "<option value='$e->idx'>$e->pat $e->mat $e->nombres</option>\n";
                            ?>
                        </select>
                        <input type="hidden" class="formy" id="expositor5_nombre" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fec_ini">Fecha Inicio</label>
                        <input type="text" class="form-control formy" id="fec_ini">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lecciones">Lecciones</label>
                        <input type="number" class="form-control formy" id="lecciones">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="matricula">C. Matricula </label>
                        <input type="number" class="form-control formy" id="matricula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="material">Material </label>
                        <input type="number" class="form-control formy" id="material">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cuota_numeros">Numero Cuotas </label>
                        <input type="number" class="form-control formy" id="cuota_numeros">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cuota">Valor Cuota </label>
                        <input type="number" class="form-control formy" id="cuota">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cuota_modo">Modalidad </label>
                        <select class="form-control formy" id="cuota_modo">
                            <?php
                            $TURNO = ['d' => 'Diario', 's' => 'Semanal', 'm' => 'Mensual', 'U' => 'Unico'];
                            foreach ($TURNO as $t => $val)
                                echo "<option value='$t'>$val</option>\n";
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <label for="finalizado">Finalizado</label>
                        <div class="custom-control custom-switch ">
                            <input type="checkbox" class="custom-control-input formy" id="finalizado" value="">
                            <label class="custom-control-label" for="finalizado"></label>
                        </div>
                    </div>
                </div>



                <button id="submit" type="button" class="btn btn-md btn-primary mr-2 " onclick="emitir();">Guardar</button>
                <button type="button" class="btn btn-md btn-danger float-right" onclick="cancelar();">Cancelar/Cerrar</button>
                <?= form_close() ?>

            </div>
        </div>
    </div>
    <script>
        let btn_submit = $("#submit");
        let llenar = async (row) => {
            $("#id").html("NUEVO");
            $("#fecha").val(new Date().toLocaleString());
            if (row == null) return;

            $("#id").html("EDITAR: " + row.idx);
            $("#submit").html("Actualizar");
            $("#idx").val(row.idx);

            $("#evento").val(row.evento);
            $("#evento_nombre").val(row.evento_nombre);
            $("#turno").val(row.turno);
            $("#expositor").val(row.expositor);
            $("#expositor_nombre").val(row.expositor_nombre);
            $("#fec_ini").val(row.fec_ini);
            $("#lecciones").val(row.lecciones);
            $("#matricula").val(row.matricula);
            $("#material").val(row.material);
            $("#cuota_numeros").val(row.cuota_numeros);
            $("#cuota").val(row.cuota);
            $("#cuota_modo").val(row.cuota_modo);
            $("#finalizado").prop("checked", row.finalizado != 0 ? true : false);

            $("#fecha").val(row.fecha);
            $("#estado").prop("checked", row.estado != 0 ? true : false);

        };

        llenar(<?= ($EVA) ?>);



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