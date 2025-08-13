<?php
require_once 'PHPMailer.php';
require_once 'classes/PHPMailerAdapter.php';

$mail = new PHPMailerAdapter;
$mail->setForm('pablo@dalloglio.net', 'Pablo');
$mail->addAddress('destinatario@tal.com', 'Nome' );
$mail->setSubject('oi...');
$mail->setTextBody('isso é um teste');
$mail->send();