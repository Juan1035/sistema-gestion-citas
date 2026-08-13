<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';


class GoogleCalendarService
{
    private Google\Client $cliente;
    private string $archivoCredenciales;
    private string $archivoToken;


    public function __construct()
    {
        $this->archivoCredenciales = __DIR__ . '/../../config/google/credentials.json';
        $this->archivoToken = __DIR__ . '/../../storage/google-token.json';


        $this->cliente = new Google\Client();


        $this->cliente->setApplicationName('Sistema de Citas');
        $this->cliente->setAuthConfig($this->archivoCredenciales);
        $this->cliente->setScopes([
            Google\Service\Calendar::CALENDAR_EVENTS
        ]);


        $this->cliente->setAccessType('offline');
        $this->cliente->setPrompt('consent');
    }


    public function estaAutorizado(): bool
    {
        if (!file_exists($this->archivoToken)) {
            return false;
        }


        $token = json_decode(
            file_get_contents($this->archivoToken),
            true
        );


        if (!$token) {
            return false;
        }


        $this->cliente->setAccessToken($token);


        if ($this->cliente->isAccessTokenExpired()) {
            if (empty($token['refresh_token'])) {
                return false;
            }


            $nuevoToken = $this->cliente->fetchAccessTokenWithRefreshToken(
                $token['refresh_token']
            );


            if (isset($nuevoToken['error'])) {
                return false;
            }


            $tokenActualizado = array_merge($token, $nuevoToken);


            file_put_contents(
                $this->archivoToken,
                json_encode($tokenActualizado, JSON_PRETTY_PRINT)
            );


            $this->cliente->setAccessToken($tokenActualizado);
        }


        return true;
    }


    public function obtenerUrlAutorizacion(): string
    {
        return $this->cliente->createAuthUrl();
    }


    public function procesarCallback(string $codigo): void
    {
        $token = $this->cliente->fetchAccessTokenWithAuthCode($codigo);


        if (isset($token['error'])) {
            throw new Exception('Error al obtener el token de Google.');
        }


        file_put_contents(
            $this->archivoToken,
            json_encode($token, JSON_PRETTY_PRINT)
        );


        $this->cliente->setAccessToken($token);
    }


    /**
     * Crear un evento en Google Calendar.
     * Devuelve el ID del evento creado.
     */
    public function crearEvento(array $cita): string
    {
        if (!$this->estaAutorizado()) {
            throw new Exception('Google Calendar no está autorizado.');
        }


        $servicioGoogle = new Google\Service\Calendar($this->cliente);


        $inicio = $cita['fecha'] . 'T' . $cita['hora'];


        $fechaHoraInicio = new DateTime(
            $inicio,
            new DateTimeZone('America/El_Salvador')
        );


        $fechaHoraFin = clone $fechaHoraInicio;
        $fechaHoraFin->modify('+30 minutes');


        $evento = new Google\Service\Calendar\Event([
            'summary' => 'Cita - ' . $cita['nombre_cliente'],
            'description' =>
                "Servicio: " . $cita['servicio'] . "\n" .
                "Teléfono: " . $cita['telefono'] . "\n" .
                "Correo: " . ($cita['correo'] ?? '') . "\n" .
                "Notas: " . ($cita['notas_adicionales'] ?? ''),
            'start' => [
                'dateTime' => $fechaHoraInicio->format(DateTime::ATOM),
                'timeZone' => 'America/El_Salvador',
            ],
            'end' => [
                'dateTime' => $fechaHoraFin->format(DateTime::ATOM),
                'timeZone' => 'America/El_Salvador',
            ],
        ]);


        $eventoCreado = $servicioGoogle->events->insert(
            'primary',
            $evento
        );


        return $eventoCreado->getId();
    }


    /**
     * Actualizar un evento existente en Google Calendar.
     */
    public function actualizarEvento(string $eventId, array $cita): void
    {
        if (!$this->estaAutorizado()) {
            throw new Exception('Google Calendar no está autorizado.');
        }


        $servicioGoogle = new Google\Service\Calendar($this->cliente);


        $evento = $servicioGoogle->events->get(
            'primary',
            $eventId
        );


        $inicio = $cita['fecha'] . 'T' . $cita['hora'];


        $fechaHoraInicio = new DateTime(
            $inicio,
            new DateTimeZone('America/El_Salvador')
        );


        $fechaHoraFin = clone $fechaHoraInicio;
        $fechaHoraFin->modify('+30 minutes');


        $evento->setSummary(
            'Cita - ' . $cita['nombre_cliente']
        );


        $evento->setDescription(
            "Servicio: " . $cita['servicio'] . "\n" .
            "Teléfono: " . $cita['telefono'] . "\n" .
            "Correo: " . ($cita['correo'] ?? '') . "\n" .
            "Notas: " . ($cita['notas_adicionales'] ?? '')
        );


        $evento->setStart(
            new Google\Service\Calendar\EventDateTime([
                'dateTime' => $fechaHoraInicio->format(DateTime::ATOM),
                'timeZone' => 'America/El_Salvador'
            ])
        );


        $evento->setEnd(
            new Google\Service\Calendar\EventDateTime([
                'dateTime' => $fechaHoraFin->format(DateTime::ATOM),
                'timeZone' => 'America/El_Salvador'
            ])
        );


        $servicioGoogle->events->update(
            'primary',
            $eventId,
            $evento
        );
    }


    /**
     * Eliminar un evento existente en Google Calendar.
     */
    public function eliminarEvento(string $eventId): void
    {
        if (!$this->estaAutorizado()) {
            throw new Exception('Google Calendar no está autorizado.');
        }


        $servicioGoogle = new Google\Service\Calendar($this->cliente);


        try {
            $servicioGoogle->events->delete(
                'primary',
                $eventId
            );
        } catch (Google\Service\Exception $e) {

            // Si el evento ya no existe en Google Calendar,
            // no impedimos que la cita sea eliminada del sistema.
            if ($e->getCode() !== 404) {
                throw $e;
            }
        }
    }
}


?>