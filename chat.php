<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location:index.php");
    exit();
}
if(isset($_GET['logout']))
{
    session_destroy();
    header("Location:index.php");
    exit();
}
define("user", htmlentities($_SESSION['username']));
require_once("db.config.php");
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

            <div id="chat">

                <h2>Simple AJAX webchat</h2>
                <h5>
                    <?= user ?>
                    &nbsp;|&nbsp;
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?logout">Sign out</a>
                </h5>

                <div id="chatbox">
                    <div id="chat-messages">
                        <img src="img/spinner.gif" alt="loader">
                    </div>
                </div>

                <div id="actionbox">
                    <input type="text" id="message" placeholder="Say something..">
                </div>

            </div>

        </div>

        <script src="js/jquery.min.js"></script>
        <script>
            $('#message').keypress(function (e) {
                if(e.which == 13)
                {
                    // Perform Ajax call
                    $.ajax({
                        url: 'chat.handler.php',
                        data: {
                            message: $('#message').val()
                        },
                        type: 'POST',
                        success: function(output)
                        {
                            if(output == "OK") {
                                // Clear message
                                $('#message').val("");
                            } else {
                                alert('Something went wrong. Your message was not posted.');
                            }
                        }
                    });
                }
            });

            setInterval(function(){
                $('#chat-messages').load('chat.receiver.php');
            }, 250);
        </script>

    </body>

</html>
