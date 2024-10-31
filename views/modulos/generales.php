<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Generales</h4>
    </div>
    <div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">       
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tipoManufactura-tab" data-bs-toggle="tab" data-bs-target="#tipoManufactura-tab-pane" type="button" role="tab" aria-controls="tipoManufactura-tab-pane" aria-selected="false">Tipo de Manufactura</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="esf_cil-tab" data-bs-toggle="tab" data-bs-target="#esf_cil-tab-pane" type="button" role="tab" aria-controls="esf_cil-tab-pane" aria-selected="false">Esf & Cil & Add</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tipo-tab" data-bs-toggle="tab" data-bs-target="#tipo-tab-pane" type="button" role="tab" aria-controls="tipo-tab-pane" aria-selected="false">Tipos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sub_tipo-tab" data-bs-toggle="tab" data-bs-target="#sub_tipo-tab-pane" type="button" role="tab" aria-controls="sub_tipo-tab-pane" aria-selected="false">Sub Tipos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="material-tab" data-bs-toggle="tab" data-bs-target="#material-tab-pane" type="button" role="tab" aria-controls="material-tab-pane" aria-selected="false" >Materiales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="clase-tab" data-bs-toggle="tab" data-bs-target="#clase-tab-pane" type="button" role="tab" aria-controls="clase-tab-pane" aria-selected="false">Clases</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sub_clase-tab" data-bs-toggle="tab" data-bs-target="#sub_clase-tab-pane" type="button" role="tab" aria-controls="sub_clase-tab-pane" aria-selected="false">Sub Clases</button>
            </li>            
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tipoManufactura-tab-pane" role="tabpanel" aria-labelledby="tipoManufactura-tab" tabindex="0"><?php require_once 'tables_generales/tabla_tipoManufactura.php';?></div>
            <div class="tab-pane fade" id="esf_cil-tab-pane" role="tabpanel" aria-labelledby="esf_cil-tab" tabindex="0"><?php require_once 'tables_generales/tabla_cil_esf.php';?></div>
            <div class="tab-pane fade" id="tipo-tab-pane" role="tabpanel" aria-labelledby="tipo-tab" tabindex="0"><?php require_once 'tables_generales/tabla_tipos.php';?></div>
            <div class="tab-pane fade" id="sub_tipo-tab-pane" role="tabpanel" aria-labelledby="sub_tipo-tab" tabindex="0"><?php require_once 'tables_generales/tabla_subtipos.php';?></div>
            <div class="tab-pane fade" id="material-tab-pane" role="tabpanel" aria-labelledby="material-tab" tabindex="0"><?php require_once 'tables_generales/tabla_materiales.php';?></div>
            <div class="tab-pane fade" id="clase-tab-pane" role="tabpanel" aria-labelledby="clase-tab" tabindex="0"><?php require_once 'tables_generales/tabla_clases.php';?></div>
            <div class="tab-pane fade" id="sub_clase-tab-pane" role="tabpanel" aria-labelledby="sub_clase-tab" tabindex="0"><?php require_once 'tables_generales/tabla_subclase.php';?></div>            
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectLocales.js"></script>
<script src="views/assets/js/select2/selectTipoManufactura.js"></script>
<script src="views/assets/js/select2/selectCombinacion.js"></script>
<script src="views/assets/js/select2/selectEsf.js"></script>
<script src="views/assets/js/select2/selectAdd.js"></script>
<script src="views/assets/js/select2/selectCil.js"></script>
<script src="views/assets/js/select2/selectSubClases.js"></script>
<script src="views/assets/js/select2/selectClases.js"></script>
<script src="views/assets/js/select2/selectMateriales.js"></script>
<!-- <script src="views/assets/js/select2/selectSubTipos.js"></script> -->
<script src="views/assets/js/select2/selectTipos.js"></script>

<script src="views/assets/js/src/model/tipomanufacturaModel.js"></script>
<script src="views/assets/js/src/controller/tipomanufacturaController.js"></script>
<script src="views/assets/js/src/view/tipomanufacturaView.js"></script>
<script src="views/assets/js/src/app/tipomanufacturaApp.js"></script>

<script src="views/assets/js/src/model/combinacionModel.js"></script>
<script src="views/assets/js/src/controller/combinacionController.js"></script>
<script src="views/assets/js/src/view/combinacionView.js"></script>
<script src="views/assets/js/src/app/combinacionApp.js"></script>

<script src="views/assets/js/src/model/subtipoModel.js"></script>
<script src="views/assets/js/src/controller/subtipoController.js"></script>
<script src="views/assets/js/src/view/subtipoView.js"></script>
<script src="views/assets/js/src/app/subtipoApp.js"></script>

<script src="views/assets/js/src/model/subclaseModel.js"></script>
<script src="views/assets/js/src/controller/subclaseController.js"></script>
<script src="views/assets/js/src/view/subclaseView.js"></script>
<script src="views/assets/js/src/app/subclaseApp.js"></script>

<script src="views/assets/js/src/model/claseModel.js"></script>
<script src="views/assets/js/src/controller/claseController.js"></script>
<script src="views/assets/js/src/view/claseView.js"></script>
<script src="views/assets/js/src/app/claseApp.js"></script>

<script src="views/assets/js/src/model/materialModel.js"></script>
<script src="views/assets/js/src/controller/materialController.js"></script>
<script src="views/assets/js/src/view/materialView.js"></script>
<script src="views/assets/js/src/app/materialApp.js"></script>

<script src="views/assets/js/src/model/tipoModel.js"></script>
<script src="views/assets/js/src/controller/tipoController.js"></script>
<script src="views/assets/js/src/view/tipoView.js"></script>
<script src="views/assets/js/src/app/tipoApp.js"></script>