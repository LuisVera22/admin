document.addEventListener('DOMContentLoaded', function () {
    // Obtén el botón y el contenedor del icono
    var button = document.querySelector('[data-bs-target="#collapseFiltro"]');
    var iconContainer = document.getElementById('iconContainer');

    // Agrega un evento de escucha al botón para cambiar el icono
    if (iconContainer) {
        button.addEventListener('click', function () {
            if (button.getAttribute('aria-expanded') === 'true') {
                // Si el collapse está expandido, cambia el icono a fa-minus
                iconContainer.innerHTML = '<i class="fas fa-minus"></i>';
            } else {
                // Si el collapse está contraído, cambia el icono a fa-plus
                iconContainer.innerHTML = '<i class="fas fa-plus"></i>';
            }
        });
    }
});

function cambiarFormatoFecha(fecha) {
    var fechaUTC = new Date(fecha + 'T00:00:00Z'); // Agrega la hora y el formato UTC
    var fechaLocal = new Date(fechaUTC.getTime() + fechaUTC.getTimezoneOffset() * 60000); // Ajusta el huso horario
    return fechaLocal.toLocaleDateString('en-GB');
}

$('.input-group.date').datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
    todayHighlight: true,
    'language': 'es'
});


function obtenerHoraActual() {
    const ahora = new Date();
    let horas = ahora.getHours();
    let minutos = ahora.getMinutes();
    let periodo = 'A.M.';

    // Convertir a formato de 12 horas
    if (horas >= 12) {
        periodo = 'P.M.';
        if (horas > 12) {
            horas -= 12;
        }
    }

    // Agregar ceros a la izquierda si es necesario
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;

    const horaFormateada = `${horas}:${minutos} ${periodo}`;

    $('#textTiempoEntrega').val(horaFormateada);

}
obtenerHoraActual();

function FechaHoy() {
    // Obtener la fecha actual
    const fechaActual = new Date();
    // Formatear las fechas como dd/mm/yyyy
    const formatoFecha = { day: '2-digit', month: '2-digit', year: 'numeric' };
    const fechaActualFormateada = fechaActual.toLocaleDateString('es-ES', formatoFecha);

    // Establecer los valores en los campos de entrada
    $('#textEmision').val(fechaActualFormateada);
    $('#textEntrega').val(fechaActualFormateada);
    $('#textFechaCuota').val(fechaActualFormateada);

    $textEmision = $('#textEmision').val();
    $textEntrega = $('#textEntrega').val();
    $textFechaCuota = $('#textFechaCuota').val();

    $('.input-group.date.textEmision').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        'language': 'es'
    }).datepicker('setDate', $textEmision);

    $('.input-group.date.textEntrega').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        'language': 'es'
    }).datepicker('setDate', $textEntrega);

    $('.input-group.date.textFechaCuota').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        'language': 'es'
    }).datepicker('setDate', $textFechaCuota);
}

FechaHoy();

function rangeFecha() {
    // Obtener la fecha actual
    const fechaActual = new Date();

    // Obtener la primera fecha del mes
    const primeraFechaDelMes = new Date(fechaActual.getFullYear(), fechaActual.getMonth(), 1);

    // Formatear las fechas como dd/mm/yyyy
    const formatoFecha = { day: '2-digit', month: '2-digit', year: 'numeric' };
    const primeraFechaFormateada = primeraFechaDelMes.toLocaleDateString('es-ES', formatoFecha);
    const fechaActualFormateada = fechaActual.toLocaleDateString('es-ES', formatoFecha);

    // Establecer los valores en los campos de entrada
    $('#textInicio').val(primeraFechaFormateada);
    $('#textFin').val(fechaActualFormateada);
    $inputDesde = $('#textInicio').val();
    $inputHasta = $('#textFin').val();
    $('#collapseFiltro .input-group.date.textInicio').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        'language': 'es'
    }).datepicker('setDate', $inputDesde);

    $('#collapseFiltro .input-group.date.textFin').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        'language': 'es'
    }).datepicker('setDate', $inputHasta);
}
rangeFecha();

$('.select2modal').next(".select2-container").find(".select2-selection__rendered").css("text-align", "center");

$(".btnCerrar").click(function () {
    formularios = $(this).parents().find("form.formularios");
    for (let i = 0; i < formularios.length; i++) {
        formularios[i].reset();
        //$(".select2").val(null).trigger('change');
        $(".select2modal").val(null).trigger('change');
        $(".select2modalUdt").val(null).trigger('change');
    }
    alertify.error('Canceló la operación');
});

function adjustMargin() {
    const navbar = document.getElementById('navbarBlur');
    const bodyElement = document.body.classList.contains('g-sidenav-hidden');
    if (window.innerWidth < 1200) {
        if (bodyElement) {
            navbar.style.marginLeft = '0';
        } else {
            if (navbar) {
                navbar.style.marginLeft = '0';
            }

        }
    } else {
        if (bodyElement) {
            navbar.style.marginLeft = '7.5rem';
        } else {
            if (navbar) {
                navbar.style.marginLeft = '17.125rem';
            }
        }
    }


}

window.addEventListener('load', adjustMargin);
window.addEventListener('resize', adjustMargin);

sidenavToggler = document.getElementsByClassName("sidenav-toggler")[0];

if (sidenavToggler) {
    sidenavToggler.addEventListener('click', function () {
        const navbar = document.getElementById('navbarBlur');
        const currentMargin = parseFloat(window.getComputedStyle(navbar).marginLeft);
        const remToPx = (rem) => parseFloat(getComputedStyle(document.documentElement).fontSize) * rem;
        if (window.innerWidth > 1200) {
            if (currentMargin === remToPx(17.125)) {
                navbar.style.marginLeft = '7.5rem';
            } else {
                navbar.style.marginLeft = '17.125rem';
            }
        }
    });
}

function handleSidenavHover(event) {
    const bodyElement = document.body.classList.contains('g-sidenav-hidden');
    if (bodyElement) {
        const navbar = document.getElementById('navbarBlur');
        if (window.innerWidth > 1200) {
            if (event.type === 'mouseenter') {
                navbar.style.marginLeft = '17.125rem';
            } else if (event.type === 'mouseleave') {
                navbar.style.marginLeft = '7.5rem';
            }
        }
    }
}
// Manejar el hover en la barra de navegación vertical
const sidenavHiden = document.getElementsByClassName('navbar-vertical')[0];
if (sidenavHiden) {
    sidenavHiden.addEventListener('mouseenter', handleSidenavHover);
    sidenavHiden.addEventListener('mouseleave', handleSidenavHover);
}





