<?= $TOP ?>
<script src="/eventos/public/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="/eventos/public/assets/vendors/js/vendor.bundle.addons.js"></script>

<body>
    <div class="container-scroller">
        <?= $NAV ?>
        <div class="container-fluid page-body-wrapper">
            <?= $SIDEBAR ?>
            <div class="main-panel">
                <?= $CONTENT ?>
                <?= $FOOTER ?>
            </div>
        </div>
    </div>

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