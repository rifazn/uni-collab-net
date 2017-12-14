<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// $user = getAuthUser();
$user = $_SESSION['logged_in_username'];

// force the user to login
if (!$user)
{
    redirectAndExit('user.php');
}
// echo "Hello $user!<br>";

if ($_POST)
{
    $content = htmlEscape(['content']);

    $sql = 'INSERT into wb_global SET content= :content, email = :email';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute( array( 'content' => $content, 'email' => $user, ) );

    if (!$result)
        echo 'that query did not happen. :(';
}

if (isset($_POST['logout']))
{
        unset($_SESSION['logged_in_username']);
        redirectAndExit('user.php');
}       

?>

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
            <?php require('templates/nav.html.php') ?>
        </nav>

        <main class="main-content">
            <form method="post" action="">
                <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."></textarea>
                <button type="submit">Submit</button>
                <button type="submit" name="logout">Logout</button>
            </form>
        </main>

        <aside class="sidebar">
            <?php require('templates/aside.html.php') ?>
        </aside> 

        <footer>
            <?php require('templates/footer.html.php'); ?>
        </footer>
    </div>
</body>
</html>
