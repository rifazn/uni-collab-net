
<?php
 require_once('lib/common.php');
	$pdo = getPDO();
	session_start();
	$user = getAuthUser();
	
	$page = $_SERVER['PHP_SELF'];
 $sec = "10";
 header("Refresh: $sec; url=$page");
	
	if(isset( $_POST['send'])){
		// $msg = htmlEscape(['msg']);
		$msg = $_POST['msg'];
		echo $msg ;
		$sql = 'INSERT into chat_global SET msg= :msg, by_user = :email';
		$stmt = $pdo->prepare($sql);
   	    $result = $stmt->execute( array( 'msg' => $msg, 'email' => $user, ) );
   	
	}
   	    // show msg
   	    $sql = "SELECT * from chat_global " ;
  		 $stmt = $pdo->query($sql) ;	
  		 
   	
   //	header("location:chat_global.php") ;  
  	?>

<!DOCTYPE html>
<html>
<head>
<title> gobal chat </title>
<link rel="stylesheet" type="text/css" href="style1.css">


</head>
<body>

<h2>Chat Messages</h2>


<div id = "main">
	<div class = "output">
        	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):;?> <br>
        	<?php echo $row['by_user'].">>".$row['timedate'].">>".$row['msg'] ;?> <br>
            <?php endwhile; ?>    	
	</div>
	
			<form method="post"  >
			<textarea name="msg" placeholder="type to send message"></textarea> 
			<button type="submit" name="send">send</button>
			</form> 
	
	
	
</div>	




</body>
</html>

