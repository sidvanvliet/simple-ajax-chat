<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location:chat.php");
    exit();
}

if(isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    header("Location:chat.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <title>Simple AJAX chat</title>

        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <div class="container">

            <div id="auth">

                <h2>Simple AJAX webchat</h2>

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                    <input type="text" name="username" placeholder="Enter an username.." class="input-nice">
                    <input type="submit" value="Continue" class="btn-nice">

                </form>

            </div>

        </div>

    </body>

</html>