<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
    $mail->isSMTP();   //Send using SMTP
    $mail->Host       = 'mail.turbo-main.my.id'; //hostname/domain yang dipergunakan untuk setting smtp
    $mail->SMTPAuth   = true;  //Enable SMTP authentication
    $mail->Username   = 'info@turbo-main.my.id'; //SMTP username
    $mail->Password   = 'buatkanAKU000';   //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
    $mail->Port       = 465;   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $nama = "Rionaldi Saputra";
    $tujuan = "rionaldi_saputra.it-student@unibamadura.ac.id";

    //Recipients
    $mail->setFrom('info@turbo-main.my.id', 'Tim Turbo');
    $mail->addAddress($tujuan, $nama);     //email tujuan
    #$mail->addReplyTo('emailtujuan@domainaddreply.com', 'Information'); //email tujuan add reply (bila tidak dibutuhkan bisa diberi pagar)
    #$mail->addCC('emailtujuan@domaincc.com'); // email cc (bila tidak dibutuhkan bisa diberi pagar)
    #$mail->addBCC('emailtujuan@domainbcc.com'); // email bcc (bila tidak dibutuhkan bisa diberi pagar)

    //Attachments
    #$mail->addAttachment('/var/tmp/file.tar.gz');   //Add attachments
    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');  //Optional name

    //Content
    $mail->isHTML(true);   //Set email format to HTML
    $mail->Subject = 'Turbo.Main - ' . $nama;

    $mail->Body    = '
    <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px;" align="center">
        <img src="https://turbo-main.my.id/logo/turbo.png" width="80" aria-hidden="true" style="margin-bottom:16px" alt="Tim Turbo" class="" data-bit="iit">
        <div style="font-family:,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
        <div style="font-size:24px">Turbo.Main</div>
            <small>"Akar Rumput dan Darah Daging Informatika"</small>
        </div>
        <br>
        <hr>
        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:justify;">
            <p><b>Selamat Datang,</b></p>
            <p>Dengan penuh rasa Semangat dengan Bangga kami menyatakan saudara <b>'. $nama .'</b> Resmi bergabung. Mari bersinergi menciptakan karya dan bekerjasama untuk memperbaiki serta mengembangkan kualitas diri. berbagi keilmuan dan pengalaman untuk membantu sesama dengan proses yang nyata.</p>
            <p style="text-align:center;"><i>"Mari Ciptakan kondisi belajar yang produktif dan jadilah generasi pencipta solusi dengan inovasi!"</i></p>
        </div>
        <div style="padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">
        <img src="https://turbo-main.my.id/logo/turbo_hitam.png" width="20" alt=""> <br>
        ©2024<br><a href="https://turbo-main.my.id/" style="color:rgba(0,0,0,0.87);text-decoration:inherit">https://turbo-main.my.id</a>
        </div>
    </div>
    ';

    $mail->AltBody = '';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
