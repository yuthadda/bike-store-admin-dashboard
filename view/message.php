<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once  '../vendor/Exception.php';
require_once  '../vendor/PHPMailer.php';
require_once  '../vendor/SMTP.php';

include_once ("../layout/navbar.php");

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mail = new PHPMailer(true);
    // var_dump($_FILES['attachments']);



try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'yuthadda22@gmail.com'; // YOUR gmail email
    $mail->Password = 'odhh bapf pqvk pans'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('yuthadda22@gmail.com', 'Yu Thadda');
    $mail->addAddress($email, $name);
    // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';


    foreach($_FILES['attachments']['name'] as $key=>$value){
        $mail->addAttachment($_FILES['attachments']['tmp_name'][$key],$_FILES['attachments']['name'][$key]);
    }

    if($mail->send()){
        $mess = "Email is successfully sent";
    }else{
        $mess = "Error in messaging";
    }
    // echo $mess;
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

}

?>
<div id="layoutSidenav">
    <?php
    include_once ("../layout/sidebar.php");

    ?>
    <div id="layoutSidenav_content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($mess)){
                    echo '<span class="alert alert-success">'.$mess.'</span>';
                }
                 ?>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold ">Enter Customer Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Enter Customer Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Enter Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Enter Body</label>
                        <textarea name="message" id="" rows="3" cols="50" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="attachments[]" multiple="multiple" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-dark" name="send">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <?php
        include_once ("../layout/footer.php");
        ?>








