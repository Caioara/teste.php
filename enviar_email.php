<?php

require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$destinatario = isset($_POST['txtDestinatario']) ? htmlspecialchars($_POST['txtDestinatario']) : '';
$assunto = isset($_POST['txtAssunto']) ? htmlspecialchars($_POST['txtAssunto']) : '';
$mensagem = isset($_POST['txtMensagem']) ? htmlspecialchars($_POST['txtMensagem']) : '';

// Função para validar o endereço de e-mail
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!validarEmail($destinatario)) {
    die('Endereço de e-mail inválido: ' . htmlspecialchars($destinatario));
}

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    //para enviar via funcao nativa do php, utilize o $mail->ismail();

    //configs para se autenticar no SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tetsuya5milagre@gmail.com';
    $mail->Password = 'ttff scsp vwwn mrzl';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //info do remetente
    $mail->setFrom('noreply@gmail.com','User');
    $mail->addReplyTo('noreply@gmail.com','User');

    //info do destinatario
    $mail->addAddress($destinatario);

    //configs do email
    $mail->isHTML(true); //corpo da mensagem aceita HTML
    $mail->Subject = utf8_decode($assunto);
    $mail->Body = utf8_decode($mensagem . "<br /><br /><strong>Enviado via PHPMailer.</strong>");

    //ENVIA o email
    $mail->send();
    echo 'Email enviado com sucesso!';
}
catch (Exception $e){
    echo 'Erro ao enviar: ' . $e->getMessage();
}

?>