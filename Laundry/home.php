<?php
require_once "author/login_guard.php";
require_once "componen/navbar.php";
require_once "componen/bootstrap.php";

allow_page_access_exclusive(["Admin", "Kasir", "Owner"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php bootstrap_css(); ?>

	<title>Home</title>
</head>
<body">
	<?php navbar(); ?>

	<main class="container py-5">
		<div class="row">
			<div class="col-md-8">
				<h1>Welcome <?= $_SESSION['nama_user']?></h1>
                <h1>in Cycle Laundry!</h1>
                <h4 style="text-align: left; margin-top: 20px;">Remember Our Vision</h4>

				<img src="../Laundry/image/homepage.png" alt="home" style="position:absolute; width: 700px; height: 720px; margin-left: 620px; margin-top: -280px;">
			</div>
		</div>
	</main>

	<?php bootstrap_js(); ?>
</body>
</html>