<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //database connection code 
    include 'connection.php';

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['Password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = [
                'name' => $row['Name'], // Stores user's name in session
                'email' => $row['Email'] // Stores user's email in session
            ];

            if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                // Sets a cookie to remember the user for a longer period (e.g., 30 days)
                $cookie_name = 'remember_user';
                $cookie_value = $row['email']; 
                $cookie_expiration = time() + (30 * 24 * 60 * 60); // 30 days

                setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");
            }

            // Redirect the user to the previous page or a default location
            if (!empty($_SESSION['prev_url']) && $_SESSION['prev_url'] !== $_SERVER['REQUEST_URI']) {
                $prev_url = $_SESSION['prev_url'];
                unset($_SESSION['prev_url']); // Clear the previous URL
                header("Location: $prev_url");
                exit();
            } else {
                header("Location: /THEPROJECT/index.php"); // Redirect to index.php if no previous URL or if it's the current page
                exit();
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
} else {
    $_SESSION['prev_url'] = $_SERVER['HTTP_REFERER'];
    header("Location: login.php"); // Redirect to the login page
    exit();
}
?>
