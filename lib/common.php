<?php

/**
 * Gets the PDO object for database acccess
 * 
 * @return \PDO
 */
function getPDO()
{
    $servername="localhost";
    $myDB="uni_project_test";
    $username="root";
    $password="";

    return new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
}

/**
 * Escapes HTML so it is safe to output
 * 
 * @param string $html
 * @return string
 */
function htmlEscape($html)
{
    return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
}

function redirectAndExit($script)
{
    // Get the domain-relative URL (e.g. /blog/whatever.php or /whatever.php) and work
    // out the folder (e.g. /blog/ or /).
    $relativeUrl = $_SERVER['PHP_SELF'];
    $urlFolder = substr($relativeUrl, 0, strrpos($relativeUrl, '/') + 1);

    // Redirect to the full URL (http://myhost/blog/script.php)
    $host = $_SERVER['HTTP_HOST'];
    $fullUrl = 'http://' . $host . $urlFolder . $script;
    header('Location: ' . $fullUrl);
    exit();
}

function getAuthUser()
{
    return isLoggedIn() ? $_SESSION['logged_in_username'] : null;
}

function isLoggedIn()
{
    return isset($_SESSION['logged_in_username']);
}

function getCourses(PDO $pdo, $user)
{
    $sql = "SELECT * FROM takes
            WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute( array('email' => $user, ));

    $courses = $stmt->fetchAll();

    return $courses;
}