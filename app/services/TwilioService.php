<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Twilio\Rest\Client;

class TwilioService
{
    private Client $cliente;
    private string $numeroWhatsApp;

    public function __construct()
    {
        $credenciales = require __DIR__ . '/../../config/twilio/credentials.php';

        $this->cliente = new Client(
            $credenciales['account_sid'],
            $credenciales['auth_token']
        );

        // Número de WhatsApp del Sandbox de Twilio
        $this->numeroWhatsApp = 'whatsapp:+17372508034';
    }

 public function enviarRecordatorio(array $cita): void
{
    $telefono = trim($cita['telefono']);

    $this->cliente->messages->create(
        'whatsapp:' . $telefono,
        [
            'from' => $this->numeroWhatsApp,
            'contentSid' => 'HXfe5ab5f00277942d4d4200328b4d403c'
        ]
    );
}

}

?>