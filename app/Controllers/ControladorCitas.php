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
        // 1. Llamar a la conexión de la base de datos
        require_once __DIR__ . '/../../config/database.php';
        
        $baseDeDatos = new Database();
        $conexion = $baseDeDatos->conectar();

        // 2. Extraer los datos de MySQL
        $sql = "SELECT * FROM citas ORDER BY fecha DESC";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        // 3. Crear la variable $citas (Requerida por el foreach de tu compañero)
        $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 4. Crear la variable $totalCitas (Requerida por el if de tu compañero)
        // La función count() cuenta cuántas filas trajo la consulta de MySQL
        $totalCitas = count($citas);

        // 5. Cargar el archivo de la vista (Asegúrate de que la ruta coincida con tu proyecto)
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
