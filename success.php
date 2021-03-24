<?php
   if(isset($_POST['submit'])) {
        $_SESSION['username'] = '';
        session_destroy();
        header("Location: index.php");

    }
 ?>

<html>
    <body>
        <h1>You have Logged in</h1>
        <form method="post" action='success.php'>
          	<input type="submit" name='submit'  value="Log out">
        </form>
    </body>
</html>