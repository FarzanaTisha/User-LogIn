<?php

    $error = '';

    if(isset($_POST['submit'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       if($username == '' || $password == '') {
            $error = 'Fill all the fields';
       }else {
            $myFile =  fopen("data.txt", "r");

            $data = fread($myFile, filesize("data.txt"));

            fclose($myFile);

            $userData = explode("\n", $data);

             for($i = 0; $i< count($userData)-1; $i++) {

                $json_decode = json_decode($userData[$i], true);
                if($json_decode['username'] == $username && $json_decode['password'] == $password)
                {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: success.php");
                }
             }
			 $error = 'invalid login';

       }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<body>
		<table>
			<h1>LOG IN HERE</h1>
		</table>
        <form action="index.php" method='post'>
		<table>
			<tr>
				<td>
					<h4>Username</h4>
				</td>
				<td>
					<input type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>
					<h4>Password</h4>
				</td>
				<td>
					<input type="Password" name="password">
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<input type="submit" name='submit'  value="Log In">

				</td>
			</tr>
			<tr>
				<td>
					<h4>Not yet a member?</h4>
				</td>
				<td>
                    <a href="/register.php">Click here to register</a>
				</td>
			</tr>
		</table>
        <?php echo $error; ?>
        </form>
</body>
</html>