<?php
include 'conn.php';

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    // Validate email address
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address, handle the error
        echo "Invalid email address!";
        exit();
    }
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'maleksawalha1996@gmail.com'; // the gmail
    $mail->Password = 'mvnhnifuxdmyvpmy'; // the gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; 

    $mail->setFrom($_POST["email"], $_POST["name"]);

    $mail->addAddress("sawalhhamalik@gmail.com", "admin");

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    header("Location: sent.html");
}
?>