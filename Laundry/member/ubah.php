<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir"]);

require_once "../utility/utils.php";
require_once "../koneksi.php";
require_once "../componen/radio-button.php";
require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";

if ($_POST) {
	$id = $_POST["id"];
	$nama_member = $_POST["nama_member"];
	$alamat = $_POST["alamat"];
	$jenis_kelamin = $_POST["jenis_kelamin"];
	$telpon = $_POST["telpon"];

	$paramsIsValid = checkParams([$id, $nama_member, $alamat, $jenis_kelamin, $telpon], ["ID", "Nama", "Alamat", "Jenis_Kelamin", "Telepon"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "UPDATE `member` SET nama_member = '$nama_member', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', telpon = '$telpon' WHERE id = $id");

	if ($query) {
		warn("Berhasil mengedit member");
		redirectTo("tampil.php");
	} else {
		warn("Gagal mengedit member");
		redirectTo("ubah.php");
	}

	exit();
}

if ($_GET) {
	global $nama_member, $alamat, $jenis_kelamin, $telpon;

	$id = $_GET["id"];

	$paramsIsValid = checkParams($id, "ID Member");

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "SELECT * FROM `member` WHERE id = $id");

	if (!$query) {
		warn("Member with ID of " . $id . "is not found");
		die();
	}

	$data_member = mysqli_fetch_array($query);

	$nama_member = $data_member["nama_member"];
	$alamat = $data_member["alamat"];
	$jenis_kelamin = $data_member["jenis_kelamin"];
	$telpon = $data_member["telpon"];
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

	<?php bootstrap_css(); ?>

	<title>Edit Member</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Edit Member</h1>

		<form action="ubah.php" method="POST">
			<input type="text" name="id" value="<?= $id ?>" hidden>
			<fieldset class="form-group">
				<legend>Nama</legend>
				<input class="form-control" type="text" name="nama_member" value="<?= $nama_member ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Alamat</legend>
				<input class="form-control" type="text" name="alamat" value="<?= $alamat ?>">
			</fieldset>

			<fieldset class="form-group">
				<legend>Jenis Kelamin</legend>
				<select class="form-select" aria-label="Choose gender" name="jenis_kelamin">
					<option value="Laki-laki" <?= $jenis_kelamin === "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
					<option value="Perempuan" <?= $jenis_kelamin === "Perempuan" ? "selected" : "" ?>>Perempuan</option>
				</select>
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