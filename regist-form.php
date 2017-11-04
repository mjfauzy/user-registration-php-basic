<?php
	require('config/config.php');
	
	$pesan = " ";
	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

		if($password == $confirmpassword) {
			$hashpassword = md5($password);
			$q_user = mysql_query("SELECT * FROM register_anggi WHERE username='$username'");
			if(mysql_num_rows($q_user) > 0) {
				$pesan = "Username Sudah Terdaftar.";
			} else {
				$q_user = mysql_query("INSERT INTO register_anggi VALUES ('','$username','$email','$hashpassword')");
				if($q_user) {
					$pesan = "Registrasi User Berhasil.";
				}
			}
		} else {
			$pesan = "Password dan Confirm password tidak sama.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form Register</title>
	</head>

	<body>
		<center>
			<h1>User Registration</h1>
			<form action="regist-form.php" method="post">
				<table>
					<tbody>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" required /></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="email" name="email" required /></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="password" required /></td>
						</tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input type="password" name="confirmpassword" required /></td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								<input type="submit" value="Submit" name="submit" />
								<input type="reset" value="Reset" />
							</td>
						</tr>
						<tr>
							<td colspan="3" align="right">
								<a href="login-form.php">Login</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>

			<p><strong><?php echo $pesan; ?></strong></p>
		</center>
	</body>
</html>