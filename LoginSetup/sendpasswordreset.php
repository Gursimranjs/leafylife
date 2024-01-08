<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'leafylifeee@gmail.com';                     //SMTP username
        $mail->Password   = 'pjcy rbmu vlmy ewdt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('leafylifeee@gmail.com', 'Leafylife');
        $mail->addAddress($email);     //Add a recipient
      
    
        //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password reset link Leafylife.com';
        $mail->Body    = "We got a request from you to reset your password!
        <br>
        Click the link below: <br>
        <a href='http://localhost/theproject/LOGINSETUP/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
     
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";

   
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM `user` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('America/Vancouver');
            $current_time = time(); // Current timestamp
            $expiry_time = $current_time + (30 * 60); // 30 minutes in seconds
            $expiry_date = date("Y-m-d H:i:s", $expiry_time); // Format to SQL datetime format

            $update_query = "UPDATE `user` SET `reset_token`='$reset_token', `reset_token_expires_at`='$expiry_date' WHERE `email`='$email'";

            if (mysqli_query($conn, $update_query) && sendMail($_POST['email'], $reset_token)) {
              

                echo "<script>alert('Password Reset Link Sent to mail'); window.location.href = 'login.php';</script>";

            } else {
                echo "<script>alert('Server down!! Try again later.');</script>";
            }
        } else {
            echo "<script>alert('Email not found.');</script>";
        }
    } else {
        echo "<script>alert('Error querying database.');</script>";
    }

    $conn->close();
}
?>