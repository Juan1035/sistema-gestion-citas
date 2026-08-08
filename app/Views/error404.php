<?php
$tituloPagina = 'Página no encontrada';
require __DIR__ . '/encabezado.php';
?>

<section class="container py-5">
    <div class="tarjeta-sistema p-4 p-md-5 text-center mx-auto" style="max-width: 760px;">
        <div class="numero-404" aria-hidden="true">404</div>
        <span class="icono-tarjeta mx-auto my-4"><i class="bi bi-signpost-split"></i></span>
        <h1 class="titulo-seccion h2 mb-3">No encontramos esa página</h1>
        <p class="texto-suave lead mb-4">
            La dirección solicitada no existe, fue movida o todavía no está disponible dentro del sistema.
        </p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <a class="btn btn-acento px-4" href="index.php?accion=inicio">
                <i class="bi bi-house-door me-2" aria-hidden="true"></i>Volver al inicio
            </a>
            <a class="btn btn-outline-secondary px-4" href="index.php?accion=listar">
                <i class="bi bi-list-check me-2" aria-hidden="true"></i>Consultar citas
            </a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/pie.php'; ?>
