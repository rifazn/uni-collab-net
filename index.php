<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

if ($user && isset($_POST[]))
{
    $content = htmlEscape(['content']);

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
