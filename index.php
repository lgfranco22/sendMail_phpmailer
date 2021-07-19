<?php

require_once 'mail.php';

$assunto = 'assunto aqui';
$mensagem = 'mensagem aqui';

if(send($assunto, $mensagem))
{
    echo "Enviado";
}
else{
    echo "erro";
}

?>