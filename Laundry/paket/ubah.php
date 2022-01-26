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
	$jenis = $_POST["jenis"];
	$harga = $_POST["harga"];

	$paramsIsValid = checkParams([$id, $jenis, $harga], ["ID", "Jenis Paket", "Harga"]);

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "UPDATE `paket` SET jenis = '$jenis', harga = '$harga' WHERE id = $id");

	if ($query) {
		warn("Berhasil mengedit paket");
		redirectTo("tampil.php");
	} else {
		warn("Gagal mengedit paket");
		redirectTo("ubah.php");
	}

	exit();
}

if ($_GET) {
	global $jenis, $harga;

	$id = $_GET["id"];

	$paramsIsValid = checkParams($id, "ID paket");

	if (!$paramsIsValid) {
		exit();
	}

	$query = mysqli_query($conn, "SELECT * FROM `paket` WHERE id = $id");

	if (!$query) {
		warn("paket with ID of " . $id . "is not found");
		die();
	}

	$data_paket = mysqli_fetch_array($query);

	$jenis = $data_paket["jenis"];
	$harga = $data_paket["harga"];

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

	<title>Edit paket</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>Edit paket</h1>

		<form action="ubah.php" method="POST">
			<input type="text" name="id" value="<?= $id ?>" hidden>

			<fieldset class="form-group">
				<legend>Harga</legend>
				<input class="form-control" type="text" name="harga" value="<?= $harga ?>">
			</fieldset>
			<br>
			<fieldset class="form-group">
				<legend>Jenis Paket</legend>
				<?php
				radio_button("jenis", "Kiloan", $jenis === "Kiloan");
				radio_button("jenis", "Selimut", $jenis === "Selimut");
				radio_button("jenis", "Bedcover", $jenis === "Bedcover");
				radio_button("jenis", "Kaos", $jenis === "Kaos");
				?>
			</fieldset>

			<button type="submit" class="btn btn-primary mt-3">Submit</button>
		</form>
	</main>

	<?php bootstrap_js(); ?>

</body>

</html>