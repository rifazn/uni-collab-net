<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('user.php');

$courses = getCourses($pdo, $user);

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
                <form action="">
                
                    <label for="course_id">Course:</label>
                    <select name="course_id">
                        <?php foreach ($courses as $course): ?>
                            <option value="<?=$course['course_id'] ?>"><?=$course['course_code'] , ' ' , $course['course_title'] ?></option>
                        <?php endforeach ?>
                    </select>
                    
                    
                    
                </form>
                <label for="upoadfiles">Upload pictures:
                    <input id="uploadfiles" name="uploadfiles" type="file" multiple="multiple" /> </label>
            </main>

            <aside class="sidebar">
                <?php require('templates/aside.html.php') ?>
            </aside> 

            <footer>
                <?php require('templates/footer.html.php'); ?>
            </footer>
        </div>
        
        <script src="resources/upload.js"></script>
    </body>
</html>
