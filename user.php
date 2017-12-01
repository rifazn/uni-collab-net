<?php
require_once('lib/common.php');
$pdo = getPDO();
session_start();

$newUser = 0;

if($_POST)
{
    $email = $_POST['username'];
    $pass = $_POST['pass'];

    // check the database if the user exists
    $sql = "SELECT email FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute( array('email' => $email, ));

    // if this is true, then the user exists so check his password
    if ($result)
    {
        $sql = "SELECT pass FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute( array('email' => $email, ));

        $pwdhash = $stmt->fetchColumn();

        if (password_verify($pwdhash, $pass)) {
            session_regenerate_id();

            $_SESSION['logged_in_username'] = $email;
        }
        else
        {
            $newUser = 1;
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Whiteboard | User Panel</title>
    </head>
    <body>
        <?php
        // load the appropriate templates
        if ($newUser)
            require('register-user.html.php');
        else
            require('login-user.html.php');
        ?>
    </body>
</html>
