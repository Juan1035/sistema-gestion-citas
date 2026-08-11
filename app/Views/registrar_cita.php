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

    <?php if (isset($error)): ?>
    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <div>
            <?= htmlspecialchars($error) ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="tarjeta-sistema p-4 p-lg-5">
                <form action="index.php?accion=guardar" method="post">
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
                            <input class="form-control" type="email" id="correo" name="correo" autocomplete="email">
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label" for="servicio">Servicio</label>

                            <select class="form-select" id="servicio" name="servicio" required>
                                <option value="" disabled <?= empty($cita['servicio']) ? 'selected' : '' ?>>
                                    Selecciona un servicio
                                </option>

                                <option value="Asesoría legal" <?= ($cita['servicio'] ?? '') === 'Asesoría legal' ? 'selected' : '' ?>>
                                    Asesoría legal
                                </option>

                                <option value="Corte de cabello" <?= ($cita['servicio'] ?? '') === 'Corte de cabello' ? 'selected' : '' ?>>
                                    Corte de cabello
                                </option>

                                <option value="Consulta" <?= ($cita['servicio'] ?? '') === 'Consulta' ? 'selected' : '' ?>>
                                    Consulta médica
                                </option>

                                <option value="Depilación" <?= ($cita['servicio'] ?? '') === 'Depilación' ? 'selected' : '' ?>>
                                    Depilación
                                </option>

                                <option value="Diseño de cejas" <?= ($cita['servicio'] ?? '') === 'Diseño de cejas' ? 'selected' : '' ?>>
                                    Diseño de cejas
                                </option>

                                <option value="Fotografía" <?= ($cita['servicio'] ?? '') === 'Fotografía' ? 'selected' : '' ?>>
                                    Fotografía
                                </option>

                                <option value="Impresión de documentos" <?= ($cita['servicio'] ?? '') === 'Impresión de documentos' ? 'selected' : '' ?>>
                                    Impresión de documentos
                                </option>

                                <option value="Limpieza facial" <?= ($cita['servicio'] ?? '') === 'Limpieza facial' ? 'selected' : '' ?>>
                                    Limpieza facial
                                </option>

                                <option value="Maquillaje" <?= ($cita['servicio'] ?? '') === 'Maquillaje' ? 'selected' : '' ?>>
                                    Maquillaje
                                </option>

                                <option value="Manicure" <?= ($cita['servicio'] ?? '') === 'Manicure' ? 'selected' : '' ?>>
                                    Manicure
                                </option>

                                <option value="Masaje" <?= ($cita['servicio'] ?? '') === 'Masaje' ? 'selected' : '' ?>>
                                    Masaje
                                </option>

                                <option value="Pedicure" <?= ($cita['servicio'] ?? '') === 'Pedicure' ? 'selected' : '' ?>>
                                    Pedicure
                                </option>

                                <option value="Peinado" <?= ($cita['servicio'] ?? '') === 'Peinado' ? 'selected' : '' ?>>
                                    Peinado
                                </option>

                                <option value="Tinte de cabello" <?= ($cita['servicio'] ?? '') === 'Tinte de cabello' ? 'selected' : '' ?>>
                                    Tinte de cabello
                                </option>

                                <option value="Tratamiento capilar" <?= ($cita['servicio'] ?? '') === 'Tratamiento capilar' ? 'selected' : '' ?>>
                                    Tratamiento capilar
                                </option>

                                <option value="Tratamiento facial" <?= ($cita['servicio'] ?? '') === 'Tratamiento facial' ? 'selected' : '' ?>>
                                    Tratamiento facial
                                </option>

                                <option value="Otro" <?= ($cita['servicio'] ?? '') === 'Otro' ? 'selected' : '' ?>>
                                    Otro
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="fecha">Fecha</label>
                            <input class="form-control" type="date" id="fecha" name="fecha" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="hora">Hora</label>
                         
<select class="form-select" id="hora" name="hora" required>
    <option value="" selected disabled>Selecciona una hora</option>
    <option value="08:00">08:00 AM</option>
    <option value="08:30">08:30 AM</option>
    <option value="09:00">09:00 AM</option>
    <option value="09:30">09:30 AM</option>
    <option value="10:00">10:00 AM</option>
    <option value="10:30">10:30 AM</option>
    <option value="11:00">11:00 AM</option>
    <option value="11:30">11:30 AM</option>
    <option value="12:00">12:00 PM</option>
    <option value="12:30">12:30 PM</option>
    <option value="13:00">01:00 PM</option>
    <option value="13:30">01:30 PM</option>
    <option value="14:00">02:00 PM</option>
    <option value="14:30">02:30 PM</option>
    <option value="15:00">03:00 PM</option>
    <option value="15:30">03:30 PM</option>
    <option value="16:00">04:00 PM</option>
    <option value="16:30">04:30 PM</option>
    <option value="17:00">05:00 PM</option>
</select>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="notas_adicionales">Notas adicionales</label>
                            <textarea class="form-control" id="notas_adicionales" name="notas_adicionales" rows="4" placeholder="Escribe aquí cualquier detalle de tu cita."></textarea>
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
