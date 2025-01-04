<!DOCTYPE html>
<html lang="fr">
<?php include('includes/nav.php')?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contact-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding-right:40px;
            padding-left:40px;
            padding:20px 20px;
            margin: 100px 100px;
            margin-left:450px;

        }
        .contact-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .contact-form textarea {
            resize: vertical;
            height: 100px;
        }
        .contact-form input[type="submit"] {
          display: block;
          width: 200px;
    margin: 0 auto;
    background-color: teal;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}
        .contact-form input[type="submit"]:hover {
            background-color: teal;
        }
    </style>

    <div class="contact-form">
        <h2>Contactez-nous</h2>
        <form action="" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </div>

</body>
<?php include('includes/footer.php')?>

</html>