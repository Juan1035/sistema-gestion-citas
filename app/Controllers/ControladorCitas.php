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
    // Comprobar campos obligatorios
    if (
        empty($_POST['nombre_cliente']) ||
        empty($_POST['telefono']) ||
        empty($_POST['servicio']) ||
        empty($_POST['fecha']) ||
        empty($_POST['hora'])
    ) {
        $error = 'Faltan datos obligatorios. Por favor, completa todos los campos requeridos.';
        require __DIR__ . '/../Views/registrar_cita.php';
        return;
    }

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Comprobar que la fecha no sea anterior a hoy
    $hoy = date('Y-m-d');

    if ($fecha < $hoy) {
        $error = 'No puedes registrar una cita con una fecha anterior a hoy.';
        require __DIR__ . '/../Views/registrar_cita.php';
        return;
    }

    // Comprobar que la hora sea válida
    $horaTimestamp = strtotime($hora);

    if ($horaTimestamp === false) {
        $error = 'La hora seleccionada no es válida.';
        require __DIR__ . '/../Views/registrar_cita.php';
        return;
    }

    // Comprobar intervalos de 30 minutos
    $minutos = (int) date('i', $horaTimestamp);

    if ($minutos !== 0 && $minutos !== 30) {
        $error = 'Las citas solamente pueden ser cada 30 minutos.';
        require __DIR__ . '/../Views/registrar_cita.php';
        return;
    }

    // Preparar los datos
    $datos = [
        'nombre_cliente' => $_POST['nombre_cliente'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'] ?? null,
        'servicio' => $_POST['servicio'],
        'fecha' => $fecha,
        'hora' => $hora,
        'notas_adicionales' => $_POST['notas_adicionales'] ?? null
    ];

    // Cargar el modelo
    require_once __DIR__ . '/../Models/ModeloCitas.php';

$modelo = new ModeloCitas();

    if ($modelo->existeCita($fecha, $hora)) {
      $error = 'La fecha y hora seleccionadas ya están ocupadas. Por favor, elige otro horario.';
      require __DIR__ . '/../Views/registrar_cita.php';
      return;
}

    $modelo->guardar($datos);

       header('Location: index.php?accion=listar');
       exit;

    }

    public function listar(): void
{
    require_once __DIR__ . '/../Models/ModeloCitas.php';

    $modelo = new ModeloCitas();

    $citas = $modelo->obtenerTodas();

    $totalCitas = count($citas);

    require __DIR__ . '/../Views/listar_citas.php';
}

   public function editar(): void
{
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: index.php?accion=listar');
        exit;
    }

    require_once __DIR__ . '/../Models/ModeloCitas.php';

    $modelo = new ModeloCitas();

    $id = (int) $_GET['id'];

    $cita = $modelo->obtenerPorId($id);

    if ($cita === null) {
        header('Location: index.php?accion=listar');
        exit;
    }

    require __DIR__ . '/../Views/editar_cita.php';
}

public function actualizar(): void
{
    // Comprobar que recibimos el ID de la cita
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        header('Location: index.php?accion=listar');
        exit;
    }

    // Comprobar campos obligatorios
    if (
        empty($_POST['nombre_cliente']) ||
        empty($_POST['telefono']) ||
        empty($_POST['servicio']) ||
        empty($_POST['fecha']) ||
        empty($_POST['hora'])
    ) {
        $error = 'Faltan datos obligatorios. Por favor, completa todos los campos requeridos.';

        $id = (int) $_POST['id'];

        require_once __DIR__ . '/../Models/ModeloCitas.php';

        $modelo = new ModeloCitas();
        $cita = $modelo->obtenerPorId($id);

        require __DIR__ . '/../Views/editar_cita.php';
        return;
    }

    $id = (int) $_POST['id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Comprobar que la fecha no sea anterior a hoy
    $hoy = date('Y-m-d');

    if ($fecha < $hoy) {
        $error = 'No puedes establecer una fecha anterior a hoy.';

        require_once __DIR__ . '/../Models/ModeloCitas.php';

        $modelo = new ModeloCitas();
        $cita = $modelo->obtenerPorId($id);

        require __DIR__ . '/../Views/editar_cita.php';
        return;
    }

    // Comprobar que la hora sea válida
    $horaTimestamp = strtotime($hora);

    if ($horaTimestamp === false) {
        $error = 'La hora seleccionada no es válida.';

        require_once __DIR__ . '/../Models/ModeloCitas.php';

        $modelo = new ModeloCitas();
        $cita = $modelo->obtenerPorId($id);

        require __DIR__ . '/../Views/editar_cita.php';
        return;
    }

    // Comprobar intervalos de 30 minutos
    $minutos = (int) date('i', $horaTimestamp);

    if ($minutos !== 0 && $minutos !== 30) {
        $error = 'Las citas solamente pueden ser cada 30 minutos.';

        require_once __DIR__ . '/../Models/ModeloCitas.php';

        $modelo = new ModeloCitas();
        $cita = $modelo->obtenerPorId($id);

        require __DIR__ . '/../Views/editar_cita.php';
        return;
    }

    // Cargar el modelo
    require_once __DIR__ . '/../Models/ModeloCitas.php';

    $modelo = new ModeloCitas();

    // Comprobar si el nuevo horario ya pertenece a otra cita
    if ($modelo->existeOtraCita($fecha, $hora, $id)) {
        $error = 'La fecha y hora seleccionadas ya están ocupadas. Por favor, elige otro horario.';

        $cita = $modelo->obtenerPorId($id);

        require __DIR__ . '/../Views/editar_cita.php';
        return;
    }

    // Preparar los datos
    $datos = [
        'nombre_cliente' => $_POST['nombre_cliente'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'] ?? null,
        'servicio' => $_POST['servicio'],
        'fecha' => $fecha,
        'hora' => $hora,
        'notas_adicionales' => $_POST['notas_adicionales'] ?? null
    ];

    // Actualizar la cita
    $modelo->actualizar($id, $datos);

    // Volver a la lista
    header('Location: index.php?accion=listar');
    exit;
}


    public function eliminar(): void
{
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: index.php?accion=listar');
        exit;
    }

    $id = (int) $_GET['id'];

    require_once __DIR__ . '/../Models/ModeloCitas.php';

    $modelo = new ModeloCitas();

    $modelo->eliminar($id);

    header('Location: index.php?accion=listar');
    exit;
}
}

?>