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

if (isset($_POST['logout']))
{
        unset($_SESSION['logged_in_username']);
        redirectAndExit('user.php');
}

if(isset($_POST['history']))
{
    redirectAndExit('history.php');
}

$sql = "SELECT DISTINCT email from wb_global join user USING(email) " ;
$stmt = $pdo->query($sql) ;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Uni Collab Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="contributors" >
    <ul>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):;?>
            <li> <?php echo $row['email'];?>  </li>
        <?php endwhile; ?>
    </ul>
    </div>

    <div id="content">
        <header id="main-header">
            <?php require('templates/header.html.php'); ?>
        </header>

        <nav class="contents-nav">
            <?php require('templates/nav.html.php') ?>
        </nav>

        <main class="main-content">

        <?php echo $content ?>

            <div id="md">
                
            </div>

            <form method="post" action="">
                <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."><?=htmlEscape($content)?></textarea>
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

    <script>
     var post = "<?php Print($content); ?>";
     console.log("trying to get from php: " + post);
    </script>
</body>
</html>
