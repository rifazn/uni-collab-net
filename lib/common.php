<?php

/**
 * Gets the DSN for the SQLite connection
 * 
 * @return string
 */
function getDsn()
{
    // TODO:
    return null;
}

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

/**
 * Compares the password provided with the hash of the password store in the db
 * @param PDO $pdo
 * @param string $username
 * @param string $password
 * @return boolean
 */
function tryLogin(PDO $pdo, $username, $password)
{
    $sql = "
        SELECT
            pass
        FROM
            user
        WHERE
            email = :username
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        array('username' => $username, )
    );

    // Get the hash from this row, and use the third-party hashing library to check it
    $hash = $stmt->fetchColumn();
    /*if (strcmp($password, $hash) == 0) {
        $success = true;
        }*/
    $success = password_verify($password, $hash);

    return $success;
}

/**
 * Logs the user in
 * 
 * For safety, we ask PHP to regenerate the cookie, so if a user logs onto a site that a cracker
 * has prepared for him/her (e.g. on a public computer) the cracker's copy of the cookie ID will be
 * useless.
 * 
 * @param string $username
 */
function login($email)
{
    session_regenerate_id();

    $_SESSION['logged_in_username'] = $email;
}

/**
 * Logs the user out
 */
function logout()
{
    unset($_SESSION['logged_in_username']);
}

function getAuthUser()
{
    return isLoggedIn() ? $_SESSION['logged_in_username'] : null;
}

function isLoggedIn()
{
    return isset($_SESSION['logged_in_username']);
}
