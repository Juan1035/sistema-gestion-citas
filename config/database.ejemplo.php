<?php

class Database {
    public function conectar() {
        $host = "localhost";
        $usuario = "root";
        $password = "";
        $base_datos = "sistema_gestion_citas";

        try {
            $conexion = new PDO(
                "mysql:host=$host;dbname=$base_datos;charset=utf8mb4",
                $usuario,
                $contraseña
            );

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conexion;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>