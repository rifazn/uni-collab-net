<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// get the logged in user
$user = getAuthUser();

// force the user to login if he has not already
if (!$user)
{
    redirectAndExit('user.php');
}

// get the current content of the whole whiteboard
$sql = "SELECT content FROM wb_global
        ORDER BY id DESC
        LIMIT 1";
$stmt = $pdo->query($sql);
$content = $stmt->fetchColumn();

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

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Whiteboard</title>
    </head>
    <body>
        <?php echo "Hello $user!<br>"; ?>
        <h1>Welcome to the whiteboard!</h1>
        <form method="post" action="">
            <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."><?=$content ?></textarea>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
