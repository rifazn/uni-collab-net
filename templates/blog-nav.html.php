<?php
		require_once('../lib/common.php');
		$pdo = getPDO();
		//session_start();
		$user = getAuthUser();
		$sql = "select title,content,created_at
				from post
				where email = :email" ;
				
		$stmt = $pdo->prepare($sql) ;
		$result = $stmt->execute( array( 'email' => $user, ) );
		
?>
<ul> 
   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):;?>
	<li> <b><u>TITLE : <?php echo $row['title'];?></b></u>  </li>
	<li><?php echo $row['content'];?></li>
	<li><small><?php echo $row['created_at'];?></small> </li>
	<?php endwhile; ?>
</ul>
