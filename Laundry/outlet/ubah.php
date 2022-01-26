<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin"]);

require_once "../utility/utils.php";
require_once "../koneksi.php";
require_once "../componen/radio-button.php";
require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";

if ($_POST) {
	$id = $_POST["id"];
	$nama_outlet = $_POST["nama_outlet"];
	$alamat = $_POST["alamat"];
	$telpon = $_POST["telpon"];

	$paramsIsValid = checkParams([$id, $nama_outlet, $alamat, $telpon], ["ID", "Nama", "Alamat", "Telepon"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "UPDATE `outlet` SET nama_outlet = '$nama_outlet', alamat = '$alamat', telpon = '$telpon' WHERE id = $id");

	if ($query) {
		warn("Berhasil mengedit outlet");
		redirectTo("tampil.php");
	} else {
		warn("Gagal mengedit outlet");
		redirectTo("ubah.php");
	}

	exit();
}

if ($_GET) {
	global $nama_outlet, $alamat, $telpon;

	$id = $_GET["id"];

	$paramsIsValid = checkParams($id, "ID outlet");

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "SELECT * FROM `outlet` WHERE id = $id");

	if (!$query) {
		warn("outlet with ID of " . $id . "is not found");
		die();
	}

	$data_outlet = mysqli_fetch_array($query);

	$nama_outlet = $data_outlet["nama_outlet"];
	$alamat = $data_outlet["alamat"];
	$telpon = $data_outlet["telpon"];
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

	<title>Edit outlet</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Edit outlet</h1>

		<form action="ubah.php" method="POST">
			<input type="text" name="id" value="<?= $id ?>" hidden>
			<fieldset class="form-group">
				<legend>Nama</legend>
				<input class="form-control" type="text" name="nama_outlet" value="<?= $nama_outlet ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Alamat</legend>
				<input class="form-control" type="text" name="alamat" value="<?= $alamat ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Nomor Telepon</legend>
				<input class="form-control" type="text" name="telpon" value="<?= $telpon ?>">
			</fieldset>
			<button type="submit" class="btn btn-primary mt-3">Submit</button>
		</form>
	</main>

	<?php bootstrap_js(); ?>

</body>
</html>