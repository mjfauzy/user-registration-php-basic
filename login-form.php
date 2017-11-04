<?php
	require('config/config.php');
	
	$pesan = " ";
	if(isset($_POST['login'])) {
		$userlogin = $_POST['userlogin'];
		$password = $_POST['password'];
		
		$hashpassword = md5($password);
		$q_user = mysql_query("SELECT * FROM register_anggi WHERE username='$userlogin' or email='$userlogin'");
		if(mysql_num_rows($q_user) > 0) {
			$q_password = mysql_query("SELECT * FROM register_anggi WHERE username='$userlogin' or email='$userlogin' and password='$hashpassword'");
			if(mysql_num_rows($q_password) > 0) {
				$r_user = mysql_fetch_array($q_password);
				$_SESSION['id_user'] = $r_user['id'];
				header('location: /user-registration/user');
			} else {
				$pesan = "Username/Email dan Password Anda tidak sesuai.";
			}
		} else {
			$pesan = "Username atau Email tidak terdaftar.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form Login</title>
	</head>

	<body>
		<center>
			<h1>User Login</h1>
			<form action="login-form.php" method="post">
				<table>
					<tbody>
						<tr>
							<td>Username / Email</td>
							<td>:</td>
							<td><input type="text" name="userlogin" required /></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="password" required /></td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								<input type="submit" value="Login" name="login" />
								<input type="reset" value="Reset" />
							</td>
						</tr>
						<tr>
							<td colspan="3" align="right">
								Belum terdaftar? <a href="regist-form.php">Registrasi</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>

			<p><strong><?php echo $pesan; ?></strong></p>
		</center>
	</body>
</html>