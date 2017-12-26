<?php

require_once('lib/common.php');
	$pdo = getPDO();


$sql ="SELECT * FROM chat_global ORDER BY id DESC";
$stmt = $pdo->query($sql) ;
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo "<span>" . $row['by_user'] . "</span>: <span>" . $row['msg'] . "</span><br />";
}
