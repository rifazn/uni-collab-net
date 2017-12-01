<?php
require_once('lib/common.php');
$pdo = getPDO();
session_start();

if ($_POST)
{
    $email = $_POST['username'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirm-pass'];

    $passMatch = $pass == $confirmPass ? true : false;

    // create the user
    if ($passMatch)
    {
        $pwdhash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user SET email = :email, pass = :pass";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute( array('email' => $email, 'pass' => $pwdhash, ));

        if ($result) echo "User created successfully!";
    }
    else
        echo "Your passwords do not match :(.<br>Please try again.)";
}