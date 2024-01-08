<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Function to generate a random alphanumeric string
function generateRandomString($length = 12)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

function sendMail($email, $card_number, $expiry_date, $cvv)
{
    require('loginsetup/PHPMailer/PHPMailer.php');
    require('loginsetup/PHPMailer/SMTP.php');
    require('loginsetup/PHPMailer/Exception.php');
    

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'leafylifeee@gmail.com';                     //SMTP username
        $mail->Password = 'pjcy rbmu vlmy ewdt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('leafylifeee@gmail.com', 'Leafylife');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Card Details for Leafylife';
        $mail->Body = "Here are your card details for Leafylife:
            <br>
            Card Number: $card_number<br>
            Expiry Date: $expiry_date<br>
            CVV: $cvv<br>
            <br>
            Please keep this information secure and do not share it with anyone.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];



    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "users");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Assuming $conn is your database connection

    // Generate card information
    $card_number = generateRandomString(12);
    $expiry_date = date("Y-m-d", strtotime("+1 year")); // Example: Expiry date set to 1 year from now
    $cvv = sprintf("%03d", rand(0, 999)); // Generate a 3-digit CVV

    // Update database with card details
    $update_query = "UPDATE `user` SET `card_number`='$card_number', `expiry_date`='$expiry_date', `cvv`='$cvv' WHERE `email`='$email'";

    if (mysqli_query($conn, $update_query)) {
        // Send email with card details to the user
        if (sendMail($email, $card_number, $expiry_date, $cvv)) {
            echo "Card details generated, updated successfully, and email sent.";
        } else {
            echo "Card details generated and updated successfully, but email sending failed.";
        }
    } else {
        echo "Error updating card details in the database.";
    }

    $conn->close();
}


?>
