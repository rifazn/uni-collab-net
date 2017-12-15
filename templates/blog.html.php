<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Your own blog</title>
        <style>
         #content {
             max-width: 732px;
             margin: 0 auto;
         }
         header {
             text-align: center;
         }
         #content input {
             width: 610px;
             padding: 0 0 0 0;
             margin: 0 0 0 0;
         }

         #content input, textarea {
             border: none;
         }
         #content textarea {
             overflow-y: auto;
             // hides the resize icon
             resize: none;
         }
        </style>
    </head>
    <body>
        <header>
            <h1>Your own personal blog space</h1>
        </header>

        <main>
            <div id="content">
                <form method="POST">
                    <input name="title" type="text" placeholder="Title..."/>
                    <button type="submit">Publish</button>

                    <!-- TODO: Option for writing Anonynously -->
                    <address class="author">
                        Your Name
                    </address>

                    <textarea cols="101" placeholder="Your story..."></textarea>
                </form>
            </div>
        </main>
    </body>
</html>
