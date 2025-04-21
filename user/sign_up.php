<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>BookBazaar - Sign Up</title>
</head>
<style>
  .error_message {
    color: red;
    margin: 0;
    font-size: 11px;
    color:red;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
}
</style>
<body>
    <div class="form-container">
        <p class="title">Sign up</p>
        <form class="form" action="sign_up_traitement.php" method="POST">
            <input type="text" class="input" placeholder="Full name" name="nom" required>
            <input type="email" class="input" placeholder="Email" name="email" required>
            <input type="password" class="input" placeholder="Password" name="mot_de_passe" required>
            <button class="form-btn" type="submit">Sign up</button>
            <?php
        session_start();
        if (isset($_SESSION['signup_error'])) {
            echo '<p class="error_message">' . $_SESSION['signup_error'] . '</p>';
            unset($_SESSION['signup_error']); 
        }
        ?>
            <p class="sign-up-label">
                I have already an account <a href="login.php"><span class="sign-up-link">Login</span></a>
            </p>
        </form>
    </div>
</body>
</html>
