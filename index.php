<?php

	session_start();

    $error = '';
    if(isset($_POST['submit'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       if($username == '' || $password == '') {
            $error = 'Fill all the fields';
       }else {
            $myFile =  fopen("data.txt", "r");

			while(!feof($myFile)) {

				$line = fgets($myFile);
				$arr = explode(" ", $line);
				
				if($username == $arr[0]) {
					if($password == $arr[1] ) {
						echo 'You are logged in';
                 		$_SESSION['userAccount'] = $username;
                    	header("Location: success.php");
					} else {
						$error = 'Password Incorrect';
					}
				} else {
					$error = 'Username not found';
				}
			}
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
                    <a href="register.php">Click here to register</a>
				</td>
			</tr>
		</table>
        <?php echo $error; ?>
        </form>
</body>
</html>