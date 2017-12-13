<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

// $user = getAuthUser();
$user = $_SESSION['logged_in_username'];
echo $user;

// force the user to login
if (!$user)
{
    // redirectAndExit('user.php');
}
echo "Hello $user!<br>";

if ($_POST)
{
    $content = htmlEscape(['content']);

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
        <h1>Welcome to the whiteboard!</h1>
        <form method="post" action="">
            <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."></textarea>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>

