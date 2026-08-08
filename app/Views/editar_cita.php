<?php
$tituloPagina = 'Editar cita';
$cita = $cita ?? [
    'id' => $_GET['id'] ?? '',
    'nombre_cliente' => '',
    'telefono' => '',
    'correo' => '',
    'servicio' => '',
    'fecha' => '',
    'hora' => '',
    'notas_adicionales' => '',
];
require __DIR__ . '/encabezado.php';
?>

<section class="container py-4 py-lg-5">
    <header class="encabezado-pagina d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3">
        <div>
            <p class="text-uppercase fw-bold small mb-2" style="color: var(--color-acento-oscuro);">Actualización</p>
            <h1 class="titulo-seccion h2 mb-2">Editar cita</h1>
            <p class="texto-suave mb-0">Modifica la información necesaria de la cita seleccionada.</p>
        </div>
        <a class="btn btn-outline-secondary" href="index.php?accion=listar">
            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Volver al listado
        </a>
    </header>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="tarjeta-sistema p-4 p-lg-5">
                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) ($cita['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">

                    <div class="row g-4">
                        <div class="col-md-7">
                            <label class="form-label" for="nombre_cliente">Nombre y apellido</label>
                            <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" value="<?= htmlspecialchars((string) ($cita['nombre_cliente'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input class="form-control" type="tel" id="telefono" name="telefono" value="<?= htmlspecialchars((string) ($cita['telefono'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="correo">Correo</label>
                            <input class="form-control" type="email" id="correo" name="correo" value="<?= htmlspecialchars((string) ($cita['correo'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="servicio">Servicio</label>
                            <input class="form-control" type="text" id="servicio" name="servicio" value="<?= htmlspecialchars((string) ($cita['servicio'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="fecha">Fecha</label>
                            <input class="form-control" type="date" id="fecha" name="fecha" value="<?= htmlspecialchars((string) ($cita['fecha'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="hora">Hora</label>
                            <input class="form-control" type="time" id="hora" name="hora" value="<?= htmlspecialchars((string) ($cita['hora'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="notas_adicionales">Notas adicionales</label>
                            <textarea class="form-control" id="notas_adicionales" name="notas_adicionales" rows="4"><?= htmlspecialchars((string) ($cita['notas_adicionales'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-column flex-sm-row justify-content-end gap-3 pt-2">
                                <a class="btn btn-outline-secondary px-4" href="index.php?accion=listar">Cancelar</a>
                                <button class="btn btn-acento px-4" type="submit">
                                    <i class="bi bi-arrow-repeat me-2" aria-hidden="true"></i>Actualizar cita
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <aside class="col-xl-4">
            <div class="bloque-acento-claro p-4">
                <div class="d-flex gap-3">
                    <span class="icono-tarjeta flex-shrink-0"><i class="bi bi-pencil-square"></i></span>
                    <div>
                        <h2 class="h5 titulo-seccion mb-2">Edición de cita</h2>
                        <p class="texto-suave mb-0">Revisa los datos modificados antes de actualizar la información.</p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</section>

<?php require __DIR__ . '/pie.php'; ?>
