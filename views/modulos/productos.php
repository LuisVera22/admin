<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Productos - Precios</h4>
    </div>
    <div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos-tab-pane" type="button" role="tab" aria-controls="productos-tab-pane" aria-selected="false">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="servicio-tab" data-bs-toggle="tab" data-bs-target="#servicio-tab-pane" type="button" role="tab" aria-controls="servicio-tab-pane" aria-selected="false">Servicios</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="productos-tab-pane" role="tabpanel" aria-labelledby="productos-tab" tabindex="0"><?php require_once 'tables_generales/tabla_productos.php'; ?></div>
            <div class="tab-pane fade" id="servicio-tab-pane" role="tabpanel" aria-labelledby="servicio-tab" tabindex="0"><?php require_once 'tables_generales/tabla_servicios.php'; ?></div>
        </div>
    </div>

</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectTipoManufactura.js"></script>
<script src="views/assets/js/select2/selectLocales.js"></script>
<script src="views/assets/js/select2/select_anidadoProducto.js"></script>

<script src="views/assets/js/src/model/servicioModel.js"></script>
<script src="views/assets/js/src/controller/servicioController.js"></script>
<script src="views/assets/js/src/view/servicioView.js"></script>
<script src="views/assets/js/src/app/servicioApp.js"></script>

<script src="views/assets/js/src/model/productoModel.js"></script>
<script src="views/assets/js/src/controller/productoController.js"></script>
<script src="views/assets/js/src/view/productoView.js"></script>
<script src="views/assets/js/src/app/productoApp.js"></script>