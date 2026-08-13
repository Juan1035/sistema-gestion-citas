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

        case 'google':
        $controlador->google();
        break;

    case 'googleCallback':
        $controlador->googleCallback();
        break;

    case 'guardar':
        $controlador->guardar();
        break;

    case 'listar':
        $controlador->listar();
        break;

    case 'editar':
        $controlador->editar();
        break;

    case 'actualizar':
        $controlador->actualizar();
        break;

    case 'eliminar':
        $controlador->eliminar();
        break;

    default:
        require 'app/Views/error404.php';
        break;
}

?>