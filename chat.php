<?php
 require_once('lib/common.php');
	$pdo = getPDO();
	 //session_start();
	$user = getAuthUser();
	
	 $sql = "SELECT * from chat_global " ;
  		 $stmt = $pdo->query($sql) ;
  		  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
        	 echo $row['by_user'].">>".$row['timedate'].">>".$row['msg'] ;
             } 
             
              
   	  
  	?>
