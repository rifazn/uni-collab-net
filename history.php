<?php
	require_once('lib/common.php');
	$pdo = getPDO();
	// session_start();
		$sql = "select id , time_date, RIGHT(content, 50)  
				from wb_global" ;
			
		$stmt = $pdo->query($sql) ;

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
