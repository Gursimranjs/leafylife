<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include'connection.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $check_existing_user = "SELECT Email FROM user WHERE Email = '$email'";
        $result = $conn->query($check_existing_user);

        if ($result->num_rows > 0) {
            // Display a warning if the user already exists
            echo "<script>
            alert('User already exists with this email address!');
            window.history.back(); // Go back to the previous page
         </script>";
            exit();
        } else {
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL to insert user data into the database
            $sql = "INSERT INTO user (Name, Email, Password) VALUES ('$name', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['user'] = $email;
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
        $conn->close();
    } else {
        echo "Passwords do not match!";
    }
}
?>