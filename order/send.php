<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once  '../vendor/Exception.php';
require_once   '../vendor/PHPMailer.php';
require_once '../vendor/SMTP.php';

include_once("../controllers/order-controller.php");

$orderId = $_POST['data'];
$orderController = new Order_controller();

$order = $orderController->getFullOrder($orderId);
$orderItems = $orderController->getOrderItems($orderId);

if($order !=null && $orderItems != null){
    try {

        $email = $order['email'];
        $name = $order['first_name']." ".$order['last_name'];
        $mail = new PHPMailer(true);
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
        $mail->Subject = "Order Information : ". $order['order_id'];
        $message = "Thank you for shopping with us...";
        $message .= "<br>The order detail is as follows.";
        $message .= "<br>
        <table>
        <tr>
        <td>".$name."<br>".$email."<br>".$order['phone']."<br>".$order['street'].",".$order['city'].",".$order['state']."</td>
        <td>Order Id: ".$order['order_id']."<br>Order Date :".$order['order_date']."<br>Required Date :".$order['required_date']."</td>
        </tr>
        </table>";
        $message .="<br>";
        $message .="<table border=1>";
        $total = 0;
        foreach($orderItems as $orderItem){
            $message.= "<tr>";
            $message.= "<td>".$orderItem['pname']."</td>";
            $message.= "<td>".$orderItem['list_price']."</td>";
            $message.= "<td>".$orderItem['quantity']."</td>";
            $message.= "<td>".$orderItem['discount']."</td>";
            $message.= "<td>".$orderItem['list_price']*$orderItem['quantity']."</td>";
            $message.="</tr>";
            $total += $orderItem['list_price']*$orderItem['quantity'];
        }
        $message .="<tr>";
        $message .="<td colspan = 4>Total : </td>";
        $message .="<td>".$total."</td>";
        $message.="</tr>";
        $message .="</table>";
        $mail->Body = $message;
        // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';


        // foreach($_FILES['attachments']['name'] as $key=>$value){
        //     $mail->addAttachment($_FILES['attachments']['tmp_name'][$key],$_FILES['attachments']['name'][$key]);
        // }

        if($mail->send()){
            $mess = "Email is successfully sent";
        }else{
            $mess = "Error in messaging";
        }
        echo $mess;
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>
