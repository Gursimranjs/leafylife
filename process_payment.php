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

function sendMail($email)
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
        $mail->Subject = 'Order Placed';
        $mail->Body = "Yor payment was successful:
            <br>
            your products will be delivered soon!!<br>
            We hope you will love our products<br>
            For any help please contact: leafylifeee@gmail.com<br>
            <br>
            ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    echo "User not logged in";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['user']['email'];

$sql = "SELECT product_name, product_price, quantity FROM cart WHERE email = '$email'";
$result = $conn->query($sql);

$totalPrice = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalPrice += ($row["product_price"] * $row["quantity"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    $check_card_query = "SELECT * FROM user WHERE email = '$email' AND card_number = '$card_number' AND expiry_date = '$expiry_date' AND cvv = '$cvv'";
    $card_result = $conn->query($check_card_query);

    if ($card_result->num_rows > 0) {
        $insert_order_query = "INSERT INTO orders (product_name, quantity, email, total_amount, status, product_image)
        SELECT cart.product_name, SUM(cart.quantity) AS quantity, '$email', '$totalPrice', 'placed', cart.product_image
        FROM cart
        WHERE cart.email = '$email'
        GROUP BY cart.product_name";
        if ($conn->query($insert_order_query) === TRUE) {
            sendMail($email);
            echo "<script>alert('Payment was successful. Your order has been placed.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error: " . $insert_order_query . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Payment failed. Please check your card details and refill the form.');</script>";
        echo "<script>window.location.href = 'payment-and-address.php';</script>";
    }
}
?>

