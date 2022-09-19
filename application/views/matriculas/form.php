<?= $TOP ?>

<body>
    <div class="container-fluid">
        <div id="principal" class="card fade ">
            <div class="card-header bg-primary text-white py-2 ">
                <h5>MATRICULAS <strong class="float-right" id="id"></strong></h5>
            </div>
            <div class="card-body">

                <?= form_open(base_url("$ORG/matriculas/save"), ['class' => '', 'id' => 'formy', 'method' => 'POST', 'autocomplete' => 'off']);
                ?>
                <input type="hidden" id="idx" value="0">
                <div class="form-row  mb-2 ">
                    <div class="form-group col-md-3 ">
                        <label for="nro_doc">DOCUMENTO PARTICIPANTE</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nro_doc" required>
                            <input type="hidden" id="participante" value="0">
                            <div class="input-group-append">
                                <button id="b" class="btn btn-primary" type="button" onclick="buscar();"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="evento">DATOS PARTICIPANTES</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly="true" id="datos">
                        </div>
                    </div>
                    <div class="form-group col-md-1 col-6 ">
                        <div class="text-center">
                            <label for="estado">Estado</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input formy" checked id="estado" value="">
                                <label class="custom-control-label" for="estado"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2  col-6">
                        <label for="usuario">Fecha</label>
                        <input type="text" class="form-control " disabled="true" id="fecha">
                    </div>
                </div>

                <div class="form-row mb-2 ">
                    <div class="form-group col-md-5 ">
                        <label for="evento">Listado de Evento</label>

                        <select class="form-control formy" id="evento" required>
                            <option value=''>Seleccione...</option>
                            <?php
                            foreach ($EVE as $e)
                                echo "<option value='$e->idx'>$e->nombre</option>\n";
                            ?>
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="turno">Inicio/Turno</label>
                        <select class="form-control formy" id="evento_apertura" name="fechas" required>
                        </select>

                    </div>
                    <div class="form-group col-md-4 ">
                        <label for="evento">Expositor</label>
                        <input type="text" class="form-control formy" id="expositor_nombre" readonly="true">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="matricula">C. Matricula </label>
                        <input type="number" class="form-control formy" id="matricula" step="any" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="material">Material </label>
                        <input type="number" class="form-control formy" id="material" step="any" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cuota_numeros">Numero Cuotas </label>
                        <input type="number" class="form-control formy" id="cuota_numeros" step="any">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cuota">Valor Cuota </label>
                        <input type="number" class="form-control formy" id="cuota" step="any">
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

                    <div class="form-group col-md-2">

                    </div>

                    <div class="form-group col-md-12">
                        <label for="detalles">Detalles Adicionales </label>
                        <input type="text" class="form-control formy" id="detalles">
                    </div>
                </div>

                <hr />
                <button id="submit" type="button" class="btn btn-md btn-primary mr-2 " onclick="emitir();">Guardar</button>
                <button type="button" class="btn btn-md btn-danger float-right" onclick="cancelar();">Cancelar/Cerrar</button>
                <?= form_close() ?>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        var btn_submit = $("#submit");
        var nro_doc = document.getElementById("nro_doc");
        var eventos = document.getElementById('evento');
        var fechas = document.getElementById('evento_apertura');

        var matricula = document.getElementById('matricula');
        var material = document.getElementById('material');
        var cuota_numeros = document.getElementById('cuota_numeros');
        var cuota = document.getElementById('cuota');
        var cuota_modo = document.getElementById('cuota_modo');

        var numberFormat = new Intl.NumberFormat('de-DE', {
            minimumFractionDigits: 2
        });

        let llenar = async (row) => {
            $("#id").html("NUEVO");
            $("#fecha").val(new Date().toLocaleString());
            if (row == null) return;

            $("#id").html("EDITAR: " + row.idx);
            $("#submit").html("Actualizar");
            $("#idx").val(row.idx);

            $("#participante").val(row.participante);
            $("#nro_doc").val(row.PAR.nro_doc);
            $("#datos").val(`${row.PAR.pat} ${row.PAR.mat} ${row.PAR.nombres}`);

            /*$("#evento").append(new Option(row.EVA.evento_nombre, row.EVA.evento)).val(row.EVA.evento);*/
            $("#evento").val(row.EVA.evento);
            $("#expositor_nombre").val(row.EVA.expositor_nombre);
            /* $("#fec_ini").val(row.fec_ini).datepicker("update", new Date($("#fec_ini").val()));*/
            $("#evento_apertura").append(new Option(row.EVA.fec_ini, row.EVA.idx)).val(row.EVA.idx);
            
            $("#matricula").val(row.matricula);

            $("#material").val(row.material);
            $("#cuota_numeros").val(row.cuota_numeros);
            $("#cuota").val(row.cuota);
            $("#cuota_modo").val(row.cuota_modo);
            $("#finalizado").prop("checked", row.finalizado != 0 ? true : false);

            $("#fecha").val(row.fecha);
            $("#estado").prop("checked", row.estado != 0 ? true : false);
        };





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
            });
            return formData;
        };

        let emitir = async () => {
            let formy = document.getElementById("formy");
            formy.classList.remove('was-validated');
            if (formy.checkValidity() === false) {
                formy.classList.add('was-validated');
                return false;
            }

            btn_submit.attr("disabled", true).html("Procesando....");
            await fetch($("#formy").attr("action"), {
                    method: 'POST',
                    body: await formDATOS()
                })
                .then((response) => {
                    if (response.status != 200) {
                        alert("Se produjo el siguiente error: " + response.statusText);
                        //cancelar();
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



        let buscar = async () => {
            $btn = document.getElementById("b");
            $btn.setAttribute('disabled', '');
            let formData2 = await formDATOS();
            formData2.append("valor", nro_doc.value);
            formData2.append("colummna", nro_doc.id);

            await fetch(`${BASE_URL}/participantes/buscar`, {
                    method: 'POST',
                    body: formData2
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    $participante = document.getElementById("participante");
                    $participante.value = 0;
                    $datos = document.getElementById("datos");
                    $datos.value = "";
                    if (data.RESP == false || data.RESP == null)
                        toast("Error: No se encontro<hr>" + nro_doc.value, "error");
                    else {
                        $participante.value = data.RESP.idx;
                        $datos.value = `${data.RESP.pat} ${data.RESP.mat} ${data.RESP.nombres}`;
                    }
                    $("#" + data.TOKEN_NAME).val(data.TOKEN_HASH);
                    $btn.removeAttribute('disabled');
                })
                .catch((e) => {
                    console.log('catch', e);
                });
        }


        let DATOS_AUX = [];

        eventos.addEventListener('change', async (event) => {

            document.querySelectorAll('#evento_apertura option').forEach(o => o.remove());
            if (event.target.value == "") {
                fechas.options.add(new Option('Seleccione Evento... ', ''));
                return;
            }

            fechas.options.add(new Option('Cargando...', ''));

            event.target.setAttribute('disabled', '');
            let formData2 = await formDATOS();
            formData2.append("valor", event.target.value);
            formData2.append("colummna", event.target.id);

            await fetch(`${BASE_URL}/eventos_aperturas/buscarAll`, {
                    method: 'POST',
                    body: formData2
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    if (data.RESP == false || data.RESP == null)
                        toast("Error: No se encontro<hr>" + nro_doc.value, "error");
                    else {
                        document.querySelectorAll('#evento_apertura option').forEach(o => o.remove());
                        fechas.options.add(new Option('Seleccione Fechas..', ''));
                        data.RESP.map((val, index) => {
                            fechas.options.add(new Option(new Date(val.fec_ini).toLocaleDateString() + ' - '+val.turno, val.idx));
                            DATOS_AUX.push(val);
                        });
                    }
                    $("#" + data.TOKEN_NAME).val(data.TOKEN_HASH);
                    event.target.removeAttribute('disabled');
                })
                .catch((e) => {
                    console.log('catch', e);
                });
        });

        fechas.addEventListener('change', async (event) => {
            let ultimo = DATOS_AUX.find(element => element.idx == event.target.value);
            completar(ultimo);
        });

        let completar = (datos) => {
            matricula.value = datos.matricula;
            material.value = datos.material;
            cuota.value = datos.cuota;
            cuota_modo.value = datos.cuota_modo;
        }

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
            llenar(<?= ($MAT) ?>);

        });
    </script>

</body>