<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Your own blog</title>
        <style>
         body {
             margin: 0;
             font-size: 16px;
         }
         #post {
             max-width: 732px;
             margin: 0 auto;
         }
         header {
             text-align: left;
             font-size: 2rem;
         }

         button {
             padding: 2px 4px;
             width: 12%;
         }
         #post input {
             width: 84%;
             padding: 0 0 0 0;
             margin: 0 0 0 0;
         }
         /*
            #content input, textarea {
            border: none;
            }
            #content textarea {
            overflow-y: auto;
            // hides the resize icon
            resize: none;
            }
          */

         /* Styles for page layout */
         #content {
             display: grid;
             grid-template-columns: 1fr 4fr;
             grid-template-areas:
                 "nav main";
         }

         main {
             grid-area: main;
         }

         nav {
             grid-area: nav;
             border-right: 1px solid black;
             height: 100vh;
         }

         nav > ul {
             list-style: none;
         }

        </style>
    </head>
    <body>
        <div id="content">
            <nav>
                Previously...
                <!-- TODO: List of previously made posts -->
                <?php include('blog-nav.html.php') ?>
            </nav>
            <main id="post">
                <header>
                    New Post
                </header>
                <form method="POST">
                    <input name="title" type="text" placeholder="Title..."/>
                    <button type="submit">Publish</button>

                    <!-- TODO: Option for writing Anonynously -->
                    <address class="author">
                        Your Name
                    </address>
                    <textarea name="content" cols="99" placeholder="Your story..."></textarea>
                </form>
            </main>
        </div>
    </body>
</html>
