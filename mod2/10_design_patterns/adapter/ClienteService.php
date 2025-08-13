<?php

class ClienteService {
    public static function informaInadimplentes($mailer) {
        $inadimplentes = Cliente::getInadimplentes();
        foreach ($inadimplentes as $cliente)
        {
            $mailer->addAddress($cliente->email);
            $mailer->setTextBody("$cliente->nome está inadimplente") ;
            $mailer->send();
        }
    }
}

/**
 * a OldEmailService, porém vamos trocá-la
 * por PHPMailerAdapter, então adaptaremos
 * os métodos antigos para funcionar com
 * PHPMailerAdapter
 */
ClienteService::informaInadimplentes( new OldEmailService );

ClienteService::informaInadimplentes( new PHPMailerAdapter );