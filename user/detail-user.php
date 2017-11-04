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

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Detail User</title>
	</head>

	<body>
		<center>
			<h1>Detail User</h1>
			<form action="#" method="post">
				<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
				<table>
					<tbody>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><?php echo $username; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $email; ?></td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								<input type="reset" value="Kembali" onclick="history.go(-1);" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</center>
	</body>
</html>