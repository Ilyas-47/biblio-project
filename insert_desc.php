<?php require_once('connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #design{
        display: flex;
        padding:0px;
        width: 50%;
    }
</style>
<body>
    <form action="desc_tratement.php" method="POST">
        <textarea name="desc" id="design">

        </textarea>
        <button type="submit"> submit</button>

    </form>
</body>
</html>