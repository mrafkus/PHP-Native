<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive("Admin");

require_once "../componen/radio-button.php";
require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../style.css">
	<?php bootstrap_css(); ?>

	<title>Tambah User</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1 style="margin-bottom: 20px;">Tambah User</h1>
		<form action="tambah_user.php" method="POST">
			<fieldset class="form-group" style="margin-bottom: 15px;">
				<legend style="margin-bottom: 0px;">Nama</legend>
				<input class="form-control" type="text" name="nama_user">
			</fieldset>
			
            <fieldset class="form-group" style="margin-bottom: 15px;">
				<legend style="margin-bottom: 0px;">Username</legend>
				<input class="form-control" type="text" name="username">
			</fieldset>

            <fieldset class="form-group" style="margin-bottom: 15px;">
				<legend style="margin-bottom: 0px;">Password</legend>
				<input class="form-control" type="password" name="password">
			</fieldset>

			<fieldset class="form-group" style="margin-bottom: 15px;">
				<legend style="margin-bottom: 0px;">Role</legend>
				<?php
				radio_button("role", "Admin");
				radio_button("role", "Kasir");
				radio_button("role", "Owner");
				?>
			</fieldset>

			<button type="submit" class="btn btn-primary mt-2" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">Submit</button>
		</form>
	</main>

	<?php bootstrap_js(); ?>

</body>

</html>

<?php
require_once "../utility/utils.php";
require_once "../koneksi.php";

if ($_POST) {
    $nama_user= $_POST["nama_user"];
	$username = $_POST["username"];
    $password = $_POST["password"];
	$role = $_POST["role"];

	$paramsIsValid = checkParams([$nama_user, $username, $password, $role], ["Nama", "Username", "Password", "Role"]);

	if (!$paramsIsValid) {
		exit();
	}

	$password = md5($password);

	$query = mysqli_query($conn, "INSERT INTO user (nama_user, username, password, role) VALUES ('$nama_user', '$username', '$password', '$role')");
	echo mysqli_error($conn);

	if ($query) {
		warn("Berhasil menambahkan user");
		echo "<script>location.href='tampil.php';</script>";
	} else {
		warn("Gagal menambahkan user");
	}
}
?>