<?php

require_once 'app/Controllers/ControladorCitas.php';

$controlador = new ControladorCitas();

$accion = $_GET['accion'] ?? 'inicio';

switch ($accion) {

    case 'inicio':
        $controlador->inicio();
        break;

    case 'registrar':
        $controlador->registrar();
        break;

    case 'listar':
        $controlador->listar();
        break;

    case 'editar':
        $controlador->editar();
        break;

    default:
        require 'app/Views/error404.php';
        break;
}