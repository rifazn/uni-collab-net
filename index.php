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
                <form method="post" action="">
           			 <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."></textarea>
           			 <button type="submit">Submit</button>
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
