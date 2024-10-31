<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Documentos Sunat</h4>
    </div>
    <div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">            
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Doc-Identidad-tab" data-bs-toggle="tab" data-bs-target="#Doc-Identidad-tab-pane" type="button" role="tab" aria-controls="Doc-Identidad-tab-pane" aria-selected="false">Doc. Identidad</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Doc-Digital-tab" data-bs-toggle="tab" data-bs-target="#Doc-Digital-tab-pane" type="button" role="tab" aria-controls="Doc-Digital-tab-pane" aria-selected="false">Doc. Digital</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">            
            <div class="tab-pane fade show active" id="Doc-Identidad-tab-pane" role="tabpanel" aria-labelledby="Doc-Identidad-tab" tabindex="0"><?php require_once 'tables_documentos/documento-identidad.php';?></div>
            <div class="tab-pane fade" id="Doc-Digital-tab-pane" role="tabpanel" aria-labelledby="Doc-Digital-tab" tabindex="0"><?php require_once 'tables_documentos/documento-digital.php';?></div>            
        </div>
    </div>
</section>