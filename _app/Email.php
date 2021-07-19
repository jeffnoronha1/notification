<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

  private $mail = \stdClass::class;

  public function __construct()
  {
    $this->mail = new PHPMailer(true);
    $this->mail->isSMTP();                                            //Send using SMTP
    $this->mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $this->mail->SMTPAuth   = 530;                                   //Enable SMTP authentication
    $this->mail->Username   = '8029bf73e5c762';                       //SMTP username
    $this->mail->Password   = '558564fb500be9';                       //SMTP password
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $this->mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $this->mail->CharSet    = 'utf-8';
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $this->mail->setLanguage('br');
    $this->mail->isHTML(true);
    $this->mail->SMTPSecure = false;
    
    $this->mail->setFrom('678091ab5c-c40ad3@inbox.mailtrap.io', 'Equipe Jefferson Noronha');
  }

  public function sendEmail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
  {
    $this->mail->Subject = (string)$subject;
    $this->mail->Body = $body;

    $this->mail->addReplyTo($replyEmail, $replyName);
    $this->mail->addAddress($addressEmail, $addressName);

    try {
      $this->mail->send();
    } catch (Exception $e) {
      echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo}{$e->getMessage()}";
    }
  }
}
