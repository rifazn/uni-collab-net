<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('user.php');

$courses = getCourses($pdo);

if ($_POST)
{
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
                <?php echo print_r($courses) ?>
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
