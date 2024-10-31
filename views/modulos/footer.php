    <?php if (isset($_GET['ruta']) && $_GET['ruta'] != "login" && $_GET['ruta'] != "cambiar-contraseña") { ?>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            SysSpektro360 ©<script>
                                document.write(new Date().getFullYear())
                            </script>,
                            <a href="" class="font-weight-bold">Spektro360. </a>
                            Todos los derechos reservados.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <?php } ?>
    </main>

    <script src="views/assets/js/core/popper.min.js"></script>
    <script src="views/assets/js/core/bootstrap.min.js"></script>
    <!-- <script src="views/assets/js/plugins/perfect-scrollbar.min.js"></script> -->
    <!-- <script src="views/assets/js/plugins/smooth-scrollbar.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="views/assets/js/es.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="views/assets/js/plugins/sweetalert2@11.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="views/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="views/assets/js/plugins/bootstrap-datepicker.es.js"></script>
    <script src="views/assets/js/plugins/toastr.min.js"></script>
    <script src="views/assets/js/plugins/kit.fontawesome.js"></script>
    <script src="views/assets/js/efectos.js"></script>
    <script>
        $('#example').DataTable({
            searchable: true,
            responsive: true,
            lengthMenu: [15, 25, 50, 100],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                paginate: {
                    previous: '<',
                    next: '>'
                }
            },
        });
    </script>
    <script>
        $('#agregar-modal,#info-series,#agregar_servicios-modal,#agregar_cil_esf_add-modal,#agregarItem,#agregar_clase-modal,#agregar_material-modal,#agregar_subtipo-modal,#agregar_tipo-modal,#agregar_subclase-modal,#agregar_productos-modal,#agregar-modal-Digital,#agregar-modal-Convencional').on('shown.bs.modal', function() {
            $('.select2modal').select2({
                width: '100%',
                dropdownParent: $(this)
            });
        });
        /* $('#info-series').on('shown.bs.modal', function() {
            $('.select2modal').select2({
                width: '100%',
                dropdownParent: $(this)
            });
        }); */

        $('#actualizar-modal,#actualizar_servicios-modal,#actualizar_cil_esf_add-modal,#actualizarItem,#actualizar_clase-modal,#actualizar_material-modal,#actualizar_subtipo-modal,#actualizar_tipo-modal,#actualizar_subclase-modal,#actualizar_productos-modal').on('shown.bs.modal', function() {
            $('.select2modalUdt').select2({
                width: '100%',
                dropdownParent: $(this)
            });
        });

        $('.select2Busqueda').select2({
            width: '100%'
        });

        /* $('[title]').each(function() {
            new bootstrap.Tooltip(this);
        }); */
    </script>
    <!--    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script> -->
    <script src="views/assets/js/soft-ui-dashboard.min.js"></script> 
    </body>

    </html>