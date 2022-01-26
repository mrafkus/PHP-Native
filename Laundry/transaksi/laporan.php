<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir", "Owner"]);

require_once "../componen/navbar.php";
require_once "../componen/bootstrap.php";
require_once "../componen/report_table.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php bootstrap_css(); ?>

	<title>Cycle Laundry</title>
</head>
<body>
	<main class="container py-5">
		<div class="row">
			<div class="col">
				<h1>Laporan</h1><br><br><br><br>
				<h1>Transaksi</h1>

				<?php
				require_once "utils.php";
				require_once "../koneksi.php";

				list_table_transaksi();
				$query_member = mysqli_query($conn, "SELECT * FROM `member` ORDER BY id");
				$query_outlet = mysqli_query($conn, "SELECT * FROM `outlet` ORDER BY id");
				$query_paket = mysqli_query($conn, "SELECT * FROM `paket` ORDER BY id");
				echo "<br>";

				echo "<h2 class='mt-3'>Member</h2>";
				report_table($query_member);
				echo "<div style='page-break-after: always;'></div>";
				echo "<br>";

				echo "<h2 class='mt-3'>Outlet</h2>";
				report_table($query_outlet);
				echo "<div style='page-break-after: always;'></div>";
				echo "<br>";

				echo "<h2 class='mt-3'>Paket</h2>";
				report_table($query_paket);
				echo "<div style='page-break-after: always;'></div>";
				echo "<br>";
				?>

				<button class="btn btn-primary" onclick="const printBtn = document.getElementById('print-btn'); printBtn.hidden = true; window.print();" id="print-btn" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">Print</button>

			</div>
		</div>
	</main>

	<?php bootstrap_js(); ?>

</body>
</html>