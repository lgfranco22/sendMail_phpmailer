<?php

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function send($assunto, $mensagem){

    try {
        $mail = new PHPMailer(true);

        $mail->setLanguage('br');
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0; // 1 para debug
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'tls://smtp.gmail.com';
        $mail->Username = EMAIL_ORIGEM;
        $mail->Password = SENHA_EMAIL;
        $mail->Port = 587;
        $mail->setFrom(EMAIL_ORIGEM);
        $mail->addAddress(EMAIL_DESTINO);
        $mail->addReplyTo(EMAIL_DESTINO);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        // echo "ERRO: {$mail->ErrorInfo}";
    }
}
