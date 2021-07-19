<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;


 $novoEmail = new Email;
 $novoEmail->sendEmail("Assunto de teste", "<p>Esse é um e-mail de <b>teste</b>!</p>","678091ab5c-c40ad3@inbox.mailtrap.io","Jefferson Noronha", "jeffin18.e.n@gmail.com","Alexa");

 var_dump($novoEmail);