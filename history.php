<?php
	require_once('lib/common.php');
	$pdo = getPDO();
	// session_start();
		$sql = "select id , time_date, content  
				from wb_global" ;
				
		  $sql1 ="select id , time_date, content  
				from wb_global" ;
			
		$stmt = $pdo->query($sql) ;
	   $stmt1 = $pdo->query($sql1) ;
	   $c=0 ;
	   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
	   {	
	   		$temp = $row['content'] ;
	   		//$row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
	   		echo $c ;
	   		$e = $c ;
	   		//$temp = str_replace($row['content']," ",$row1['content'] ) ;
	   		while(($e>0) && ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) )
	   		{   $temp2 = $row2['content'] ;
	   			$temp = str_replace($temp2 ,"83745683765",$temp ) ;
	   			$e=$e-1 ;
	   		}
	   		$c=$c+1 ;
	   		echo $temp ;
	   		echo "<br>";
	   		
	   }
	   
?>


<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>

</head>
<body>

<table style="width:100%">
  <tr>
    <th>id</th>
    <th>time & date </th> 
    <th>content</th>
  </tr>
    <?php
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)):;?>
                                                         
				<tr>
					<td><?php echo $row['id'];?> </td>
					<td><?php echo $row['time_date']	;?> </td>
					<td><?php echo $row['RIGHT(content, 50)'];?> </td>
															 
				</tr>	
									
	<?php endwhile; ?>
		</table>
	</body>
</html>
