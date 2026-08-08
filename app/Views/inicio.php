<?php
$tituloPagina = 'Inicio';
require __DIR__ . '/encabezado.php';
?>

<section class="container py-4 py-lg-5">
    <div class="hero-sistema p-4 p-md-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="etiqueta-acento mb-3">
                    <i class="bi bi-stars" aria-hidden="true"></i>
                    Agenda organizada, negocio en movimiento
                </span>
                <h1 class="display-5 fw-bold mb-3">Tus citas, claras y bajo control.</h1>
                <p class="lead texto-secundario mb-4">
                    Administra reservas y horarios desde una interfaz profesional diseñada para cualquier tipo de negocio.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a class="btn btn-acento btn-lg px-4" href="index.php?accion=registrar">
                        <i class="bi bi-calendar-plus me-2" aria-hidden="true"></i>Registrar una cita
                    </a>
                    <a class="btn btn-contorno-claro btn-lg px-4" href="index.php?accion=listar">
                        <i class="bi bi-list-check me-2" aria-hidden="true"></i>Consultar agenda
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bloque-acento-claro p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="icono-tarjeta"><i class="bi bi-calendar2-week"></i></span>
                        <div>
                            <p class="mb-0 fw-bold">Agenda disponible</p>
                            <small class="texto-suave">Lista para comenzar a registrar citas</small>
                        </div>
                    </div>
                    <p class="mb-0 texto-suave">
                        Cuando se agreguen citas, aquí podrá mostrarse un resumen general de la agenda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 g-lg-4 mt-1">
        <div class="col-md-4">
            <article class="tarjeta-sistema tarjeta-metrica p-4">
                <div class="d-flex justify-content-between align-items-start gap-3">
                    <div>
                        <p class="texto-suave mb-2">Citas registradas</p>
                        <p class="display-6 fw-bold mb-1">0</p>
                        <small class="texto-suave">Total en la agenda</small>
                    </div>
                    <span class="icono-tarjeta"><i class="bi bi-calendar-check"></i></span>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="tarjeta-sistema tarjeta-metrica p-4">
                <div class="d-flex justify-content-between align-items-start gap-3">
                    <div>
                        <p class="texto-suave mb-2">Citas de hoy</p>
                        <p class="display-6 fw-bold mb-1">0</p>
                        <small class="texto-suave">Agenda del día</small>
                    </div>
                    <span class="icono-tarjeta"><i class="bi bi-calendar-day"></i></span>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="tarjeta-sistema tarjeta-metrica p-4">
                <div class="d-flex justify-content-between align-items-start gap-3">
                    <div>
                        <p class="texto-suave mb-2">Próximas citas</p>
                        <p class="display-6 fw-bold mb-1">0</p>
                        <small class="texto-suave">Reservas programadas</small>
                    </div>
                    <span class="icono-tarjeta"><i class="bi bi-clock-history"></i></span>
                </div>
            </article>
        </div>
    </div>

    <section class="pt-5">
        <div class="row align-items-end g-3 mb-4">
            <div class="col-lg-7">
                <p class="text-uppercase fw-bold small mb-2" style="color: var(--color-acento-oscuro);">Gestión sencilla</p>
                <h2 class="titulo-seccion mb-2">Todo lo necesario para organizar la atención</h2>
                <p class="texto-suave mb-0">Una base visual adaptable a distintos servicios, equipos y formas de trabajo.</p>
            </div>
        </div>

        <div class="row g-3 g-lg-4">
            <div class="col-md-4">
                <article class="tarjeta-sistema p-4 h-100">
                    <span class="icono-tarjeta mb-3"><i class="bi bi-lightning-charge"></i></span>
                    <h3 class="h5 titulo-seccion">Registro rápido</h3>
                    <p class="texto-suave mb-0">Captura los datos principales de cada cita con un formulario claro y ordenado.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="tarjeta-sistema p-4 h-100">
                    <span class="icono-tarjeta mb-3"><i class="bi bi-search"></i></span>
                    <h3 class="h5 titulo-seccion">Consulta organizada</h3>
                    <p class="texto-suave mb-0">Visualiza clientes, horarios y servicios desde una misma tabla.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="tarjeta-sistema p-4 h-100">
                    <span class="icono-tarjeta mb-3"><i class="bi bi-arrows-angle-contract"></i></span>
                    <h3 class="h5 titulo-seccion">Diseño adaptable</h3>
                    <p class="texto-suave mb-0">La interfaz se ajusta a computadora, tableta y celular sin perder claridad.</p>
                </article>
            </div>
        </div>
    </section>
</section>

<?php require __DIR__ . '/pie.php'; ?>
