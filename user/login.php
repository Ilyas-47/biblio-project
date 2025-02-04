<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>BookBazaar</title>
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
        <p class="title">Login</p>
        <form class="form" action="login_traitement.php" method="POST">
          <input type="email" class="input" placeholder="Email" name="email" required>
          <input type="password" class="input" placeholder="Password" name="password" required>
          <p class="page-link">
            <span class="page-link-label">Forgot Password?</span>
          </p>
          <button type="submit" class="form-btn">Log in</button>
          <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<p class="error_message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Supprimer le message après l'affichage
        }
        ?>
        </form>
        <p class="sign-up-label">
          Don't have an account? <a href="sign_up.php"><span class="sign-up-link">Sign up</span></a>
        </p>
      </div>
</body>
</html>
