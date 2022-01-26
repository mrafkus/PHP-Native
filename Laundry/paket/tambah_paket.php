<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin"]);

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

	<title>Tambah Paket</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Tambah Paket</h1>

		<form action="tambah_paket.php" method="POST">
		<fieldset class="form-group">
				<legend>Harga</legend>
				<input class="form-control" type="text" name="harga">
			</fieldset>
			<br>
			<fieldset class="form-group">
				<legend>Jenis Paket</legend>
				<?php
				radio_button("jenis", "Kiloan");
				radio_button("jenis", "Selimut");
				radio_button("jenis", "Bedcover");
				radio_button("jenis", "Kaos");
				?>
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
	$jenis = $_POST["jenis"];
	$harga = $_POST["harga"];

	$paramsIsValid = checkParams([$jenis, $harga], ["Jenis Paket", "Harga"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "INSERT INTO paket (`jenis`, `harga`) VALUES ('$jenis', '$harga')");

	if ($query) {
		warn("Berhasil menambahkan paket");
		echo "<script>location.href='tampil.php';</script>";
	} else {
		warn("Gagal menambahkan paket");
	}
}
?>