<?php
	require_once('lib/common.php');
	$pdo = getPDO();
	session_start();
	$user = getauthuser() ;
	$sql = "select course_id
			from takes 
			where email =:email" ;
	$stmt = $pdo -> prepare($sql) ;
	$result=$stmt -> execute( array('email' => $user,)) ;
?>

<!doctype html>

<html>
	<head>
	</head>
	<body>
		<menu label="courses">
	<?php while ($row = $stmt->fetchcolumn() ): ?>
		<?php $_session["course"] = $row ?>
			<menuitem label="hgf" >
				<a href="local_wb.php"> <?php echo $row ?> </a>
			</menuitem>
	<?php endwhile ; ?>
		</menu>
	</body>
</html>	
