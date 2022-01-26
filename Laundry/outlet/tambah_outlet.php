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

	<title>Tambah Outlet</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Tambah Outlet</h1>
		<form action="tambah_outlet.php" method="POST">
			<div class="mb-3">
				<label for="nama-input" class="form-label">Nama</label>
				<input type="text" class="form-control" id="nama-input" name="nama_outlet">
			</div>
			<div class="mb-3">
				<label for="alamat-input" class="form-label">Alamat</label>
				<input type="alamat" class="form-control" id="alamat-input" name="alamat">
			</div>
			<div class="mb-3">
				<label for="telepon-input" class="form-label">Telepon</label>
				<input type="telepon" class="form-control" id="telepon-input" name="telpon">
			</div>
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
	$nama_outlet = $_POST["nama_outlet"];
	$alamat = $_POST["alamat"];
	$telpon = $_POST["telpon"];

	$paramsIsValid = checkParams([$nama_outlet, $alamat, $telpon], ["Nama", "Alamat", "Telepon"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "INSERT INTO outlet (nama_outlet, alamat, telpon) VALUES ('$nama_outlet', '$alamat', '$telpon')");

	if ($query) {
		warn("Berhasil menambahkan outlet");
		redirectTo("tampil.php");
	} else {
		warn("Gagal menambahkan outlet");
	}
}
?>