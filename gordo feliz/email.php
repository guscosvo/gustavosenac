<?php

require './phpmail/class.phpmailer.php';

class Email extends PHPMailer
{

    public static
            function enviaNovoEmail($corpo, $assunto, $email, $razao) {
        $mail           = new PHPMailer;
        $mail->IsMail();
        $mail->Host     = "mail.tripwiser.com.br";
        $mail->SMTPAuth = true;
        $mail->Port     = 587;
        $mail->Username = 'contatomedio@tripwiser.com.br';
        $mail->Password = 'm7FneRSRGjVM3tV5eaUj';

        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From     = "contatomedio@tripwiser.com.br";
        $mail->Sender   = "gustavo2430costa@gmail.com";
        $mail->FromName = "Gordo Feliz";

        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        if (!empty($email))
        {
            $mail->AddAddress($email, $razao);
        }
	    //$mail->AddCC('brianledze@gmail.com.br', 'Copias');
        $mail->AddBCC('contatomedio@tripwiser.com.br', 'Brian Ensino Médio');

        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $assunto . "http://www.tripwiser.com.br";
        $mail->Body    = $corpo;
        $mail->AltBody = $corpo;

        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        // Exibe uma mensagem de resultado
        if ($enviado)
        {
           $msg = "E-mail Enviado";
   
   
           echo "<script>
           alert( '$msg!' ); location = 'http://www.tripwiser.com.br/ensinomedio/brian/site';
           </script>";
        }
        else
        {
            echo "Não foi possível enviar o e-mail. <br>";
            echo "Informações do erro: " . $mail->ErrorInfo;
        }
    }

}
