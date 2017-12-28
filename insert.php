<?php
require_once('lib/common.php');
	$pdo = getPDO();
	session_start();


	$user = getAuthUser();
// $uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];


$sql="INSERT INTO chat_global (`by_user`, `msg`) VALUES ('$user', '$msg')";
$stmt = $pdo->query($sql) ;

$result1 = $pdo -> query("SELECT * FROM chat_global ORDER BY id DESC");

while($row = $result1->fetch(PDO::FETCH_ASSOC))
{
	echo "<span>" . $row['by_user'] . "</span>: <span>" . $row['msg'] . "</span><br />";
}



