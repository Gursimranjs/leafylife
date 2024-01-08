<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Login</title>
</head>
<body>
    <?php
    // Checks if the 'forgot' parameter exists in the URL
    $showForgotPassword = isset($_GET['forgot']) && $_GET['forgot'] === 'true';
    $showRegister = isset($_GET['register']) && $_GET['register'] === 'true';
    ?>
    <section class="login" <?php if (!$showForgotPassword && !$showRegister) { echo 'style="display: block;"'; } else { echo 'style="display: none;"'; } ?>>
        <form method="post" action="logindetails.php">
            <!-- login form -->
            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="forget">
                <label>
                    <input type="checkbox" name="remember">Remember Me
                </label>
                <a href="login.php?forgot=true" id="forgotpass">Forgot Password</a>
            </div>
            <button class="loginbtn">Log in</button>
            <div class="register">
                <p>Don't have an account? <a href="login.php?register=true">Register</a></p>
            </div>
        </form>
    </section>

    <section class="forgotp" <?php if ($showForgotPassword) { echo 'style="display: block;"'; } else { echo 'style="display: none;"'; } ?>>
        <form method="post" action="sendpasswordreset.php">
            <!-- forgot password form -->
            <h1>Reset Password</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
         
            <button id="forgot-next" type="submit">Send link</button>
            <div id="backtologin">
                <a href="login.php">Login</a>
            </div>
        </form>
    </section>

    <!-- register form -->
    <section class="register-section" <?php if ($showRegister) { echo 'style="display: block;"'; } else { echo 'style="display: none;"'; } ?>>
    <form method="post" action="register.php">
            <h1>Register</h1>
            <div class="inputbox">
                <input type="text" name="name" required>
                <label>Name</label>
            </div>
            <div class="inputbox">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="inputbox">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>
            <button id="registerbtn" type="submit">Register</button>
            <div id="backtologin">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </section>


</body>
</html>
