<!DOCTYPE html>
<html>
    <head>
        <title>Uni Collab Net</title>
    </head>
    <style>
     #content {
         display: grid;
         grid-template-columns: 1fr 2fr 1fr;
         grid-template-rows: 1fr auto 1fr;
         grid-template-areas:
             "nav header header"
             "nav main aside"
             "nav footer aside";
     }
     #main-header {
         grid-area: header;
     }
     .contents-nav {
         grid-area: nav;
     }
     .main-content {
         grid-area: main;
     }
     .sidebar {
         grid-area: aside;
     }
     footer {
         grid-area: footer;
     }
    </style>
    <body>
        <div id="content">
            <header id="main-header">
                <h1>Uni Collab Net</h1>
        	<small>Find out what's going on around your Uni.</small>
                
            </header>
            
            
            <nav class="contents-nav">
                <ul>
                  	<li>Blog</li>
		    		<li>Courses you are doing</li>
		    		<li>Course Resources</li>
		    		<li>Your Cloud</li>
		    		<li>Classmates from your courses</li>
                </ul>
            </nav>
            
            
            <main class="main-content">
                <form method="post" action="">
           			 <textarea cols="50" id="" name="content" rows="10" placeholder="write something in it. All yours to use."></textarea>
           			 <button type="submit">Submit</button>
       			 </form>
            </main>
            
            
            
            <aside class="sidebar">
                <?php echo "Hello, Sourav Saha"; ?>
        		<button>Logout</button>
            </aside>
            <footer>
                uni collab
            </footer>
        </div>
    </body>
</html>
