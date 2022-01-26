<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir"]);

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
	<title>Tambah Member</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Tambah Member</h1>

		<form action="tambah_member.php" method="POST">
			<fieldset class="form-group">
				<legend>Nama</legend>
				<input class="form-control" type="text" name="nama_member">
			</fieldset>

			<fieldset class="form-group">
				<legend>Alamat</legend>
				<input class="form-control" type="text" name="alamat">
			</fieldset>

			<fieldset class="form-group">
				<legend>Jenis Kelamin</legend>
				<select class="form-select" aria-label="Choose gender" name="jenis_kelamin">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</fieldset>
			
			<fieldset class="form-group">
				<legend>Nomor Telepon</legend>
				<input class="form-control" type="text" name="telpon">
			</fieldset>

			<button type="submit" class="btn btn-primary mt-3" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">Submit</button>
		</form>
	</main>

	<?php bootstrap_js(); ?>

</body>

</html>

<?php
require_once "../utility/utils.php";
require_once "../koneksi.php";

if ($_POST) {
	$nama_member = $_POST["nama_member"];
	$alamat = $_POST["alamat"];
	$jenis_kelamin = $_POST["jenis_kelamin"];
	$telpon = $_POST["telpon"];

	$paramsIsValid = checkParams([$nama_member, $alamat, $jenis_kelamin, $telpon], ["Nama", "Alamat", "Jenis_Kelamin", "Telepon"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "INSERT INTO member (`nama_member`, `alamat`, `jenis_kelamin`, `telpon`) VALUES ('$nama_member', '$alamat', '$jenis_kelamin', '$telpon')");

	if ($query) {
		warn("Berhasil menambahkan member");
		echo "<script>location.href='tampil.php';</script>";
	} else {
		warn("Gagal menambahkan member");
	}
}
?>