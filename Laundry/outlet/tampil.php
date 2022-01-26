<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive("Admin");

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

	<title>List Outlet</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1>List Outlet</h1>

		<a href="tambah_outlet.php" class="btn btn-primary mt-4" id="add-anchor" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">+ Tambah Outlet</a>

		<?php
		require_once "../componen/list_table.php";
		require_once "../koneksi.php";

		$query = mysqli_query($conn, "SELECT * FROM `outlet`");

		list_table($query);
		?>

	</main>

	<?php bootstrap_js(); ?>

</body>

</html>