<?php

class ModeloCitas
{
    public function guardar(array $datos): bool
    {
        require_once __DIR__ . '/../../config/database.php';

        $conexion = conectar();

        $sql = "INSERT INTO citas
                (nombre_cliente, telefono, correo, servicio, fecha, hora, notas_adicionales)
                VALUES
                (:nombre_cliente, :telefono, :correo, :servicio, :fecha, :hora, :notas_adicionales)";

        $stmt = $conexion->prepare($sql);

        return $stmt->execute([
            ':nombre_cliente' => $datos['nombre_cliente'],
            ':telefono' => $datos['telefono'],
            ':correo' => $datos['correo'],
            ':servicio' => $datos['servicio'],
            ':fecha' => $datos['fecha'],
            ':hora' => $datos['hora'],
            ':notas_adicionales' => $datos['notas_adicionales']
        ]);
    }

    public function existeCita(string $fecha, string $hora): bool
    {
        require_once __DIR__ . '/../../config/database.php';

        $conexion = conectar();

        $sql = "SELECT id FROM citas
                WHERE fecha = :fecha AND hora = :hora
                LIMIT 1";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ':fecha' => $fecha,
            ':hora' => $hora
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function existeOtraCita(string $fecha, string $hora, int $id): bool
{
    require_once __DIR__ . '/../../config/database.php';

    $conexion = conectar();

    $sql = "SELECT id FROM citas
            WHERE fecha = :fecha
            AND hora = :hora
            AND id != :id
            LIMIT 1";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ':fecha' => $fecha,
        ':hora' => $hora,
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}

    public function obtenerTodas(): array
{
    require_once __DIR__ . '/../../config/database.php';

    $conexion = conectar();

    $sql = "SELECT * FROM citas
            ORDER BY fecha DESC, hora DESC";

    $stmt = $conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function obtenerPorId(int $id): ?array
{
    require_once __DIR__ . '/../../config/database.php';

    $conexion = conectar();

    $sql = "SELECT * FROM citas
            WHERE id = :id
            LIMIT 1";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $cita = $stmt->fetch(PDO::FETCH_ASSOC);

    return $cita !== false ? $cita : null;
}

public function actualizar(int $id, array $datos): bool
{
    require_once __DIR__ . '/../../config/database.php';

    $conexion = conectar();

    $sql = "UPDATE citas SET
                nombre_cliente = :nombre_cliente,
                telefono = :telefono,
                correo = :correo,
                servicio = :servicio,
                fecha = :fecha,
                hora = :hora,
                notas_adicionales = :notas_adicionales,
                updated_at = CURRENT_TIMESTAMP
            WHERE id = :id";

    $stmt = $conexion->prepare($sql);

    return $stmt->execute([
        ':nombre_cliente' => $datos['nombre_cliente'],
        ':telefono' => $datos['telefono'],
        ':correo' => $datos['correo'],
        ':servicio' => $datos['servicio'],
        ':fecha' => $datos['fecha'],
        ':hora' => $datos['hora'],
        ':notas_adicionales' => $datos['notas_adicionales'],
        ':id' => $id
    ]);
}

public function eliminar(int $id): bool
{
    require_once __DIR__ . '/../../config/database.php';

    $conexion = conectar();

    $sql = "DELETE FROM citas
            WHERE id = :id";

    $stmt = $conexion->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}

}

?>