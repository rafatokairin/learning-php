<?php

class PHPMailerAdapter {
    private $pm;

    function __construct() {
        $this->pm = new PHPMailer(true);
        $this->pm->CharSet = 'utf-8';
    }

    // setForm, na PHPMailer é FormName...
    function setForm($form, $name) {
        $this->pm = $form;
        $this->pm->FormName = $name;
    }

    function setSubject($subject) {
        $this->pm->Subject = $subject;
    }

    function setTextBody($body) {
        $this->pm->Body = $body;
        $this->pm->isHTML(false);
    }

    function addAddress($address, $name = '') {
        $this->pm->AddAddress($address, $name);
    }

    public function send() {
        $this->pm->Send();
        return true;
    }
}