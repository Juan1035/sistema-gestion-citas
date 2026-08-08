<?php

declare(strict_types=1);

class ControladorCitas
{
    public function inicio(): void
    {
        require __DIR__ . '/../Views/inicio.php';
    }

    public function registrar(): void
    {
        require __DIR__ . '/../Views/registrar_cita.php';
    }

    public function guardar(): void
    {
        // La lógica de guardado será conectada por el desarrollador del backend.
    }

    public function listar(): void
    {
        require __DIR__ . '/../Views/listar_citas.php';
    }

    public function editar(): void
    {
        require __DIR__ . '/../Views/editar_cita.php';
    }

    public function eliminar(): void
    {
        // La lógica de eliminación será conectada por el desarrollador del backend.
    }
}
