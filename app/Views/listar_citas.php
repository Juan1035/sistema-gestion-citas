<?php
$tituloPagina = 'Listado de citas';
$citas = $citas ?? [];
$totalCitas = count($citas);
require __DIR__ . '/encabezado.php';
?>

<section class="container py-4 py-lg-5">
    <header class="encabezado-pagina d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3">
        <div>
            <p class="text-uppercase fw-bold small mb-2" style="color: var(--color-acento-oscuro);">Agenda general</p>
            <h1 class="titulo-seccion h2 mb-2">Listado de citas</h1>
            <p class="texto-suave mb-0">Consulta las citas registradas desde una sola vista.</p>
        </div>
        <a class="btn btn-acento" href="index.php?accion=registrar">
            <i class="bi bi-calendar-plus me-2" aria-hidden="true"></i>Nueva cita
        </a>
    </header>

    <form class="tarjeta-sistema p-3 p-lg-4 mb-4" action="index.php" method="get">
        <input type="hidden" name="accion" value="listar">
        <div class="row g-3 align-items-end">
            <div class="col-lg-7">
                <label class="form-label" for="buscar_cita">Buscar</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search texto-suave"></i></span>
                    <input class="form-control border-start-0" type="search" id="buscar_cita" name="buscar" placeholder="Nombre, teléfono, correo o servicio">
                </div>
            </div>
            <div class="col-sm-8 col-lg-4">
                <label class="form-label" for="filtro_fecha">Fecha</label>
                <input class="form-control" type="date" id="filtro_fecha" name="fecha">
            </div>
            <div class="col-sm-4 col-lg-1 d-grid">
                <button class="btn btn-primario" type="submit" aria-label="Aplicar filtros">
                    <i class="bi bi-funnel"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="tarjeta-sistema overflow-hidden">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 p-4 border-bottom">
            <h2 class="h5 titulo-seccion mb-0">Citas registradas</h2>
            <span class="badge rounded-pill text-bg-light border px-3 py-2">
                <?= $totalCitas ?> <?= $totalCitas === 1 ? 'registro' : 'registros' ?>
            </span>
        </div>

        <div class="table-responsive">
            <table class="table tabla-citas align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">Nombre y apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Notas adicionales</th>
                        <th scope="col" class="text-end acciones-tabla">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($totalCitas === 0): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="bi bi-calendar-x d-block fs-2 mb-2" style="color: var(--color-acento-oscuro);"></i>
                                <strong class="d-block titulo-seccion">No hay citas registradas</strong>
                                <span class="texto-suave">Las citas aparecerán aquí cuando sean agregadas.</span>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($citas as $cita): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) ($cita['nombre_cliente'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars((string) ($cita['telefono'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars((string) ($cita['correo'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars((string) ($cita['servicio'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars((string) ($cita['fecha'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars((string) ($cita['hora'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= nl2br(htmlspecialchars((string) ($cita['notas_adicionales'] ?? ''), ENT_QUOTES, 'UTF-8')) ?></td>
                                <td class="text-end acciones-tabla">
                                    <a class="btn btn-sm btn-outline-primary" href="index.php?accion=editar&id=<?= urlencode((string) ($cita['id'] ?? '')) ?>" aria-label="Editar cita">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a
                                        class="btn btn-sm btn-outline-danger" href="index.php?accion=eliminar&id=<?= urlencode((string) ($cita['id'] ?? '')) ?>" aria-label="Eliminar cita"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');"> 
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-top">
            <small class="texto-suave">
                Mostrando <?= $totalCitas ?> <?= $totalCitas === 1 ? 'cita' : 'citas' ?>
            </small>
        </div>
    </div>
</section>

<?php require __DIR__ . '/pie.php'; ?>
