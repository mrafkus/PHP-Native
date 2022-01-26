<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive("Admin");

require_once "../utility/utils.php";
require_once "../koneksi.php";
require_once "../componen/radio-button.php";
require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";

if ($_POST) {
	$id = $_POST["id"];
	$nama_user = $_POST["nama_user"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$role = $_POST["role"];

	$paramsIsValid = checkParams([$id, $nama_user, $username, $password, $role], ["ID", "Nama", "Username", "Password", "Role"]);

	if (!$paramsIsValid) {
		exit();
	}

	$password = md5($password);

	$query = mysqli_query($conn, "UPDATE `user` SET nama_user = '$nama_user', username = '$username', password = '$password', role = '$role' WHERE id = $id");

	if ($query) {
		warn("Berhasil mengedit user");
		redirectTo("tampil.php");
	} else {
		warn("Gagal mengedit user");
	}

	exit();
}

if ($_GET) {
	global $nama_user, $username, $password, $role;

	$id = $_GET["id"];

	$paramsIsValid = checkParams($id, "ID User");

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "SELECT * FROM `user` WHERE id = $id");

	if (!$query) {
		warn("User with ID of " . $id . "is not found");
		die();
	}

	$data_user = mysqli_fetch_array($query);

	$nama_user = $data_user["nama_user"];
	$username = $data_user["username"];
	$password = $data_user["password"];
	$role = $data_user["role"];
} else {
	warn("No ID specified");
	die();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">

	<?php bootstrap_css(); ?>

	<title>Edit User</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Ubah User</h1>
		<form action="ubah.php" method="POST">
			<input type="text" name="id" value="<?= $id ?>" hidden>

			<fieldset class="form-group">
				<legend>Nama</legend>
				<input class="form-control" type="text" name="nama_user" value="<?= $nama_user ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Username</legend>
				<input class="form-control" type="text" name="username" value="<?= $username ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Password</legend>
				<input class="form-control" type="text" name="password">
			</fieldset>

			<fieldset class="form-group">
				<legend>Role</legend>
				<select class="form-select" aria-label="Choose role" name="role">
					<option value="Admin" <?= $role === "Admin" ? "selected" : "" ?>>Admin</option>
					<option value="Kasir" <?= $role === "Kasir" ? "selected" : "" ?>>Kasir</option>
					<option value="Owner" <?= $role === "Owner" ? "selected" : "" ?>>Owner</option>
				</select>
			</fieldset>
			<button type="s
            ubmit" class="btn btn-primary mt-3">Submit</button>
		</form>
	</main>

	<?php bootstrap_js(); ?>

</body>

</html>