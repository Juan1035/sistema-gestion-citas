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
                <<form action="index.php?accion=actualizar" method="post">
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
                            <input class="form-control" type="date" id="fecha" name="fecha" value="<?= htmlspecialchars((string) ($cita['fecha'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="col-md-6">
    <label class="form-label" for="hora">Hora</label>

    <select class="form-select" id="hora" name="hora" required>
        <option value="" disabled>Selecciona una hora</option>

        <option value="08:00" <?= ($cita['hora'] ?? '') === '08:00:00' ? 'selected' : '' ?>>08:00 AM</option>
        <option value="08:30" <?= ($cita['hora'] ?? '') === '08:30:00' ? 'selected' : '' ?>>08:30 AM</option>
        <option value="09:00" <?= ($cita['hora'] ?? '') === '09:00:00' ? 'selected' : '' ?>>09:00 AM</option>
        <option value="09:30" <?= ($cita['hora'] ?? '') === '09:30:00' ? 'selected' : '' ?>>09:30 AM</option>
        <option value="10:00" <?= ($cita['hora'] ?? '') === '10:00:00' ? 'selected' : '' ?>>10:00 AM</option>
        <option value="10:30" <?= ($cita['hora'] ?? '') === '10:30:00' ? 'selected' : '' ?>>10:30 AM</option>
        <option value="11:00" <?= ($cita['hora'] ?? '') === '11:00:00' ? 'selected' : '' ?>>11:00 AM</option>
        <option value="11:30" <?= ($cita['hora'] ?? '') === '11:30:00' ? 'selected' : '' ?>>11:30 AM</option>
        <option value="12:00" <?= ($cita['hora'] ?? '') === '12:00:00' ? 'selected' : '' ?>>12:00 PM</option>
        <option value="12:30" <?= ($cita['hora'] ?? '') === '12:30:00' ? 'selected' : '' ?>>12:30 PM</option>
        <option value="13:00" <?= ($cita['hora'] ?? '') === '13:00:00' ? 'selected' : '' ?>>01:00 PM</option>
        <option value="13:30" <?= ($cita['hora'] ?? '') === '13:30:00' ? 'selected' : '' ?>>01:30 PM</option>
        <option value="14:00" <?= ($cita['hora'] ?? '') === '14:00:00' ? 'selected' : '' ?>>02:00 PM</option>
        <option value="14:30" <?= ($cita['hora'] ?? '') === '14:30:00' ? 'selected' : '' ?>>02:30 PM</option>
        <option value="15:00" <?= ($cita['hora'] ?? '') === '15:00:00' ? 'selected' : '' ?>>03:00 PM</option>
        <option value="15:30" <?= ($cita['hora'] ?? '') === '15:30:00' ? 'selected' : '' ?>>03:30 PM</option>
        <option value="16:00" <?= ($cita['hora'] ?? '') === '16:00:00' ? 'selected' : '' ?>>04:00 PM</option>
        <option value="16:30" <?= ($cita['hora'] ?? '') === '16:30:00' ? 'selected' : '' ?>>04:30 PM</option>
        <option value="17:00" <?= ($cita['hora'] ?? '') === '17:00:00' ? 'selected' : '' ?>>05:00 PM</option>
    </select>
</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="notas_adicionales">Notas adicionales</label>
                            <textarea class="form-control" id="notas_adicionales" name="notas_adicionales" rows="4" placeholder="Escribe aquí cualquier detalle de tu cita."><?= htmlspecialchars((string) ($cita['notas_adicionales'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
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
