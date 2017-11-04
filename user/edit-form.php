<?php

	require('../config/config.php');

	$id_user = $_GET['id'];
	$pesan = " ";

	$q_user = mysql_query("SELECT * FROM register_anggi WHERE id='$id_user'");
	if(mysql_num_rows($q_user) > 0) {
		$r_user = mysql_fetch_array($q_user);
		$username = $r_user['username'];
		$email = $r_user['email'];
	}

	if(isset($_POST['update'])) {
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

		if($password == $confirmpassword) {
			$hashpassword = md5($password);
			$q_user = mysql_query("SELECT * FROM register_anggi WHERE id='$id_user'");
			if(mysql_num_rows($q_user) > 0) {
				$q_user = mysql_query("UPDATE register_anggi SET username='$username', email='$email', password='$hashpassword' WHERE id='$id_user'");
				if($q_user) {
					$pesan = "Update User Berhasil.";
					header('location: ../user');
				}
			} else {
				$pesan = "Username Sudah Terdaftar.";
			}
		} else {
			$pesan = "Password dan Confirm password tidak sama.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form Edit User</title>
	</head>

	<body>
		<center>
			<h1>Edit User</h1>
			<form action="edit-form.php?id=<?php echo $id_user; ?>" method="post">
				<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
				<table>
					<tbody>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" value="<?php echo $username; ?>" required /></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="email" name="email" value="<?php echo $email; ?>" required /></td>
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
								<input type="submit" value="Update" name="update" />
								<input type="reset" value="Kembali" onclick="history.go(-1);" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>

			<p><strong><?php echo $pesan; ?></strong></p>
		</center>
	</body>
</html>