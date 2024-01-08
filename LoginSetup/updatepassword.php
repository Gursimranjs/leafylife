<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Password</title>
</head>

<body>
    <?php
    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['email']) && isset($_GET['reset_token'])) {
        $email = $_GET['email'];
        $resettoken = $_GET['reset_token'];
        date_default_timezone_set('America/Vancouver');
        $current_time = time();

        $select_query = "SELECT * FROM `user` WHERE `email`='$email' AND `reset_token`='$resettoken'";

        $result = mysqli_query($conn, $select_query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo '
                <section class="updatepass-section">
                <form method="post">
                <h1>Reset Password</h1>
                <div class="inputbox">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="inputbox">
                    <input type="password" name="confirm_password" required>
                    <label>Confirm Password</label>
                </div>
                <button id="updatebtnnew" name="updatepassword" type="submit">Update</button>
                <div id="backtologin">
                    <p>Want to go back to <a href="login.php">Login?</a></p>
                </div>
                </form>
                </section>';
            } else {
                echo "<script>
                    alert('Invalid or Expired Link');
                    window.location.href='login.php';
                    </script>";
            }
        } else {
            echo "Error occurred: " . mysqli_error($conn);
        }
    }

    if(isset($_POST["updatepassword"])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if($password === $confirm_password) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Update the password in the database
            $update_query = "UPDATE `user` SET `password`='$hashed_password' WHERE `email`='$email'";
            $update_result = mysqli_query($conn, $update_query);

            if($update_result) {
                echo "<script>alert('Password updated successfully!');</script>";
                // Redirect or take any other necessary action after successful password update.
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    }
    ?>
</body>
</html>
