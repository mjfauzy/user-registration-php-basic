<?php

	require('../config/config.php');

	$id_user = $_SESSION['id_user'];
	$q_user = mysql_query("SELECT username FROM register_anggi WHERE id='$id_user'");
	if(mysql_num_rows($q_user)) {
		$r_user = mysql_fetch_array($q_user);
		$r_username = $r_user['username'];
	}

	$pesan = " ";

	if(isset($_GET['deleted'])) {
		if($_GET['deleted']) {
			$pesan = "Berhasil Hapus User.";
		} else {
			$pesan = "Gagal Hapus User.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Page</title>
	</head>
	<body>
		<center>
			<h1>Hello, <?php echo $r_username; ?></h1>
			<table border="1">
				<thead>
					<tr>
						<th colspan="3" align="center">User List</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$q_users = mysql_query("SELECT * FROM register_anggi");
						$no = 0;
						if($q_users > 0):
							while($r_users = mysql_fetch_array($q_users)):
								$id_user = $r_users['id'];
								$username = $r_users['username'];
					?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo $username;  ?></td>
						<td>
							<a href="edit-form.php?id=<?php echo $id_user; ?>">Edit</a> | 
							<?php if($_SESSION['id_user'] != $id_user): ?><a href="hapus-user.php?id=<?php echo $id_user; ?>">Hapus</a> | <?php endif; ?>
							<a href="detail-user.php?id=<?php echo $id_user; ?>">Detail</a>
						</td>
					</tr>
					<?php
							endwhile;
						endif;
					?>
				</tbody>
			</table>
			<a href="logout.php">Logout</a>
			<p><strong><?php echo $pesan; ?></strong></p>
		</center>
	</body>
</html>