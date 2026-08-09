<?php
$tituloPagina = 'Registrar cita';
require __DIR__ . '/encabezado.php';
?>

<section class="container py-4 py-lg-5">
    <header class="encabezado-pagina d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3">
        <div>
            <p class="text-uppercase fw-bold small mb-2" style="color: var(--color-acento-oscuro);">Nueva reserva</p>
            <h1 class="titulo-seccion h2 mb-2">Registrar una cita</h1>
            <p class="texto-suave mb-0">Completa la información para agregar una cita a la agenda.</p>
        </div>
        <a class="btn btn-outline-secondary" href="index.php?accion=listar">
            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Volver a la agenda
        </a>
    </header>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="tarjeta-sistema p-4 p-lg-5">
                <form action="#" method="post">
                    <div class="row g-4">
                        <div class="col-md-7">
                            <label class="form-label" for="nombre_cliente">Nombre y apellido</label>
                            <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" autocomplete="name" required>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input class="form-control" type="tel" id="telefono" name="telefono" autocomplete="tel" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="correo">Correo</label>
                            <input class="form-control" type="email" id="correo" name="correo" autocomplete="email" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="servicio">Servicio</label>
                            <input class="form-control" type="text" id="servicio" name="servicio" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="fecha">Fecha</label>
                            <input class="form-control" type="date" id="fecha" name="fecha" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="hora">Hora</label>
                            <input class="form-control" type="time" id="hora" name="hora" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="notas_adicionales">Notas adicionales</label>
                            <textarea class="form-control" id="notas_adicionales" name="notas_adicionales" rows="4"></textarea>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-column flex-sm-row justify-content-end gap-3 pt-2">
                                <a class="btn btn-outline-secondary px-4" href="index.php?accion=listar">Cancelar</a>
                                <button class="btn btn-acento px-4" type="submit">
                                    <i class="bi bi-check2-circle me-2" aria-hidden="true"></i>Guardar cita
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <aside class="col-xl-4">
            <div class="bloque-acento-claro p-4 mb-4">
                <div class="d-flex gap-3">
                    <span class="icono-tarjeta flex-shrink-0"><i class="bi bi-info-circle"></i></span>
                    <div>
                        <h2 class="h5 titulo-seccion mb-2">Antes de guardar</h2>
                        <p class="mb-0 texto-suave">Verifica que la fecha, la hora y los datos de contacto sean correctos.</p>
                    </div>
                </div>
            </div>

            <div class="tarjeta-sistema p-4">
                <h2 class="h5 titulo-seccion mb-3">Datos de la cita</h2>
                <ul class="list-unstyled mb-0 d-grid gap-3">
                    <li class="d-flex gap-2"><i class="bi bi-check-circle-fill" style="color: var(--color-acento-oscuro);"></i><span>Nombre y datos de contacto</span></li>
                    <li class="d-flex gap-2"><i class="bi bi-check-circle-fill" style="color: var(--color-acento-oscuro);"></i><span>Servicio solicitado</span></li>
                    <li class="d-flex gap-2"><i class="bi bi-check-circle-fill" style="color: var(--color-acento-oscuro);"></i><span>Fecha, hora y notas adicionales</span></li>
                </ul>
            </div>
        </aside>
    </div>
</section>

<?php require __DIR__ . '/pie.php'; ?>
