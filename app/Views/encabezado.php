<?php
$tituloPagina = $tituloPagina ?? 'Sistema de Citas';
$accionActual = $_GET['accion'] ?? 'inicio';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema general de gestión de citas para negocios.">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?> | Sistema de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="public/css/estilos.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-sistema sticky-top" aria-label="Navegación principal">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php?accion=inicio">
            <span class="marca-icono" aria-hidden="true"><i class="bi bi-calendar2-check"></i></span>
            <span>
                <strong class="d-block">CitaPro</strong>
                <small class="marca-subtitulo">Gestión inteligente</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link <?= $accionActual === 'inicio' ? 'active' : '' ?>" href="index.php?accion=inicio">
                        <i class="bi bi-house-door me-1" aria-hidden="true"></i>Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $accionActual === 'registrar' ? 'active' : '' ?>" href="index.php?accion=registrar">
                        <i class="bi bi-calendar-plus me-1" aria-hidden="true"></i>Registrar cita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= in_array($accionActual, ['listar', 'editar'], true) ? 'active' : '' ?>" href="index.php?accion=listar">
                        <i class="bi bi-list-check me-1" aria-hidden="true"></i>Listar citas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
