<?php
/**
 * Created by IntelliJ IDEA.
 * User: remi
 * Date: 17/01/15
 * Time: 11:41
 */
require_once('../lib/common.php');
$pdo = getPdo();
session_start();
$user = getAuthuser();

if (isset($_FILES['uploaded_file'])) {
	$imgDir = "images/";
    // Example:
    if( move_uploaded_file( $_FILES['uploaded_file']['tmp_name'], $imgDir . $_FILES['uploaded_file']['name'] ) )
    {
    	$sql = "INSERT INTO resources SET by_user=:user;
    			SET @last_id = LAST_INSERT_ID();
    			INSERT INTO resources_for SET 
    			r_id = @last_id";
    	$stmt = $pdo->prepare($sql);
    	$result = $stmt->execute( array('user' => $user, ) );
    	echo $user . 'And result is: ' . $result . "\n";
        echo $_FILES['uploaded_file']['name']. " uploaded ...";
    } 
    else 
    {
        echo $_FILES['uploaded_file']['name']. " NOT uploaded ...";
    }

    exit;
} else {
    echo "no";
}

?>
