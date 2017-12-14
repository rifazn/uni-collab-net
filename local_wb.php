<?php
	require_once('lib/common.php') ;
	$pdo = getPDO() ;
	session_start();
	$user = getAuthUser();
	$course = $_GET["c"];
	$sql = "select content 
			from wb 
			where course_id = :course_id
			order by id desc 
			limit 1" ;
	
			
	$stmt = $pdo -> prepare($sql) ;
	$content =$stmt->execute( array( 'course_id' => $course ,  ) );
	
	
	 $content = $stmt -> fetchColumn();
	
	
	if ($_POST)
	{
		$content = htmlEscape($_POST['content']);
		echo $content;

		$sql = "INSERT into wb SET content = :content, email = 'ss@ss.com', course_id = :course_id";
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute( array( 'content' => $content, 'course_id' => $course, ) );

		if (!$result) {
		    echo 'that query did not happen. :(';
		}

		
	}
	if (isset($_POST['logout']))
	{
			unset($_SESSION['logged_in_username']);
			redirectAndExit('user.php');
	}		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Uni Collab Net</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="content">
		<header id="main-header">
			<?php require('templates/header.html.php'); ?>
		</header>

		<nav class="contents-nav">
			<?php require('templates/nav.html.php') ?>
		</nav>

		<main class="main-content">
			<?php echo "welcome to course:" . $course . "<br>"; ?>
			<form method="post">
				<textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."><?=$content ?></textarea>
				<button type="submit">Submit</button>
				<button type="submit" name="logout">Logout</button>
			</form>
		</main>

		<aside class="sidebar">
			<?php require('templates/aside.html.php') ?>
		</aside> 

		<footer>
			<?php require('templates/footer.html.php'); ?>
		</footer>
	</div>
</body>
</html>
