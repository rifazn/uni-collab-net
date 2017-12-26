<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('user.php');

if ($_POST)
{
    $content = htmlEscape($_POST['content']);

    $sql = 'INSERT into wb_global SET content= :content, email = :email';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute( array( 'content' => $content, 'email' => $user, ) );

    if (!$result)
        echo 'that query did not happen. :(';
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
                    <button type="submit" name="history">history</button>
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
