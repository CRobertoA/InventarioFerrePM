<?php

    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    require '../../PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'otakujuno@gmail.com';
        $mail->Password = 'vcqnyhcdenqvipcb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
    
        $mail->setFrom('otakujuno@gmail.com', 'Ferreteria');
        $mail->addAddress('rob.acesan@gmail.com', 'Receptor');
        //$mail->addCC('rob.acesan@gmail.com');
    
        //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
    
        $mail->isHTML(true);
        $mail->Subject = 'Prueba desde GMAIL';
        $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
        $mail->send();
    
        echo 'Correo enviado';
    } catch (Exception $e) {
        echo 'Mensaje de error correo' . $mail->ErrorInfo;
    }

?>