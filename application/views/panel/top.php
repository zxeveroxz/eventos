<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administracion de Eventos y Enseñanzas</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/eventos/public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/eventos/public/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="/eventos/public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/eventos/public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/eventos/public/assets/vendors/css/vendor.bundle.addons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/eventos/public/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/eventos/public/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="/eventos/public/assets/images/favicon.ico" />


    <script src="/eventos/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/eventos/public/assets/vendors/js/vendor.bundle.addons.js"></script>

    <script src="/eventos/public/assets/js/shared/off-canvas.js"></script>
    <script src="/eventos/public/assets/js/shared/misc.js"></script>
    <script src="/eventos/public/assets/js/demo_1/dashboard.js"></script>

    <!-- toast styles -->
    <link rel="stylesheet" href="/eventos/public/bt4/css/toast.min.css">
    <script src="/eventos/public/bt4/js/toast.min.js"></script>

    <!-- number jquery -->
    <script src="/eventos/public/jquery.number.min.js"></script>

    <!-- datetimepicker -->
    <script src="/eventos/public/bt4/js/moment-with-locales.min.js"></script>
    <script src="/eventos/public/bt4/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/eventos/public/bt4/css/bootstrap-datepicker.min.css">

    <style>
        .invalid-tooltip {
            font-size: 00.5rem;
            padding: 3px;
            margin-left: 00.5rem;
            margin-top: -0.5rem;
        }

        .form-control {
            font-weight: bold;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .form-control:focus {
            color: #001EB2;
            background-color: yellow;
            border-color: #001EB2;
        }

        .form-control::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: gray;
            opacity: 0.5;
            /* Firefox */
        }


        .form-group {
            line-height: 1.0rem;
        }

        .form-group label {
            margin-bottom: 2px;
            color: grey;
        }

        .card .card-body {
            padding: 1.5rem 1.5rem 1.0rem;
        }

        .modal-body {
            padding-bottom: 0.5rem;
        }


        #loading {
            position: fixed;
            z-index: 99999;
            width: 2rem;
            height: 2rem;
            border: 5px solid #f3f3f3;
            border-top: 6px solid #9c41f2;
            border-radius: 100%;
            margin: auto;
            visibility: hidden;
            animation: spin 1s infinite linear;
        }

        #loading.display {
            visibility: visible;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <script>
        const BASE_URL = "<?=base_url($ORG)?>";
        window.closeModal = function() {
            $('.modal').modal('hide');
        };


        window.toast = (contenido, tipo = "ok", tiempo = 3000) => {
            $.toast({
                title: 'Mensaje',
                /*subtitle: '11 mins ago',*/
                content: contenido,
                type: tipo == "ok" ? "success" : "error",
                delay: tiempo,
                dismissible: true,
                position: "bottom-center"
            });
        }

        /*d.toLocaleDateString('en-GB'); fecha en español */
    </script>
</head>
<div id="loading"></div>