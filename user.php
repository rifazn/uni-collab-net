<?php
require_once('lib/common.php');
$pdo = getPDO();
session_start();

$newUser = 0;

if($_POST)
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // check the database if the user exists
    $sql = "SELECT email FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute( array('email' => $email, ));

    // if this is true, then the user exists so check his password
    if ($stmt->fetchColumn())
    {
        $sql = "SELECT pass FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute( array('email' => $email, ));

        $pwdhash = $stmt->fetchColumn();

        if (password_verify($pass, $pwdhash)) {
            session_regenerate_id();

            $_SESSION['logged_in_username'] = $email;
            redirectAndExit('index.php');
        }
    }
    else
    {
        $newUser = 1;
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
<!DOCTYPE html>
<html>
    <head>
        <title>Uni Collab Net</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="content">
            <header id="main-header">
                <?php require('templates/header.html.php'); ?>
            </header>
            
            <nav class="contents-nav">
                
            </nav>
            
            <main class="main-content">
                <?php
        // load the appropriate templates
        if ($newUser)
            require('register-user.html.php');
        else
            require('login-user.html.php');
        ?>
            </main>
            
            <aside class="sidebar">
                
            </aside> 

            <footer>
                <?php require('templates/footer.html.php'); ?>
            </footer>
        </div>
    </body>
</html>