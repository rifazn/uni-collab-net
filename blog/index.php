<?php

require_once('../lib/common.php');
$pdo = getPDO();
session_start();

// get the user info
$user = getAuthUser();

// get the markdown parser
require_once('../lib/parsedown/Parsedown.php');
$Parsedown = new Parsedown();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('../user.php');

// TODO: Implement a better user checking thing
// if the user is not logged in, offer him a modal for logging in / registering

// TODO: a navbar that shows the already written blog posts by the user

// code for posting
if ($_POST)
{
    $title = $_POST['title'];
    $content = $Paredown->text($_POST['content']);

    $sql = 'INSERT into post
            SET title = :title,
                content = :content,
                email = :email';
    $stmt = $pdo->prepare($sql);

    echo "$title, $content, user: $user <br>";

    $result = $stmt->execute( array('title' => $title, 'content' => $content, 'email' => $user, ));

    if (!$result)
    {
        throw new Exception('There was an error while posting to the blog.');
    }
}

include('../templates/blog.html.php');
