<?php

require_once('../lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('user.php');

$courses = getCourses($pdo, $user);
$result = null;

if($_GET)
{
    $courseId = $_GET['course_id'];

    $sql = "SELECT * FROM resources JOIN resources_for ON (resources.id = resources_for.r_id) WHERE resources_for.takes_id = :course_id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(array('course_id' => $courseId, ));
    $resources = $stmt->fetchAll();
    echo $result;

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
                <?php require('../templates/header.html.php'); ?>
            </header>

            <nav class="contents-nav">
                <?php require('../templates/nav.html.php') ?>
            </nav>

            <main class="main-content">

                <section id="gallery">
                    <?php if (isset($resources)): ?>
                        <?php foreach($resources as $course): ?>
                            <?php echo "<img src=\"" . $course['photo'] . "\" />"; ?>
                        <?php endforeach; ?>
                    <?php endif ?>
                </section>

                <a href="upload.php">Upload your notes and/or pictures</a>
                <form method="GET">
                    <label for="course_id"> Course:
                        <select name="course_id" id="course_id">
                            <?php foreach ($courses as $course): ?>
                                <option value="<?=$course['course_id'] ?>"><?=$course['course_code'] , ' ' , $course['course_title'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </label>

                    <button type="submit">Submit</button>

                </form>
            </main>

            <aside class="sidebar">
                <?php require('../templates/aside.html.php') ?>
            </aside>

            <footer>
                <?php require('../templates/footer.html.php'); ?>
            </footer>
        </div>

        <!-- <script src="upload.js"></script> -->
    </body>
</html>
