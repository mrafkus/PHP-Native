<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir"]);

require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";
require_once "../componen/list_table.php";
require_once "../utility/utils.php";



function status_to_badge_converter($status)
{
	$bg_theme = "bg-primary";

	switch ($status) {
		case "Dibayar":
			$bg_theme = "bg-success";
			break;
		case "Belum":
			$bg_theme = "bg-warning text-dark";
			break;
	}

	$status = titleize($status);

	return "<span class=\"badge rounded-fill $bg_theme\">$status</span>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">

	<?php bootstrap_css(); ?>

	<title>List Transaksi</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>List Transaksi</h1>

		<a href="tambah_transaksi.php" class="btn btn-primary" id="add-anchor">+ Tambah Transaksi</a>

		<?php
		require_once "utility.php";
		require_once "../koneksi.php";

		list_table_transaksi();
		?>

	</main>

	<?php bootstrap_js(); ?>

</body>
</html>