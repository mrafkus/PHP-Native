<?php
include "header.php";

include "filter_kasir.php";
?>
<h2>Produk Mebel</h2>
<div class="row">
	<?php
	include "koneksi2.php";


	$query = "SELECT * FROM produk";

	if ($stmt = $conn->prepare($query)) {
		$stmt->execute();

		if ($stmt->errno) {
			die("Failed to execute MySQLi statement ({$stmt->errno}): " . $stmt->error);
		}

		$stmt->bind_result($id_produk, $nama_produk, $deskripsi, $bahan, $harga, $foto_produk);

		$index = 0;
		while ($stmt->fetch()) {
			$index++;
	?>

			<div class="col-md-3">
				<div class="card">
					<img src="<?= $foto_produk ?>" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?= $nama_produk ?></h5>
						<p class="card-text"><?= substr($deskripsi, 0, 70) ?></p>
						<a href="beli.php?id=<?= $id_produk ?>" class="btn btn-primary">Beli</a>
					</div>
				</div>
			</div>

	<?php
		}

		$stmt->close();
	} else {
		die("Failed to prepare() statement: " . $conn->error);
	}

	$conn->close();
	?>
</div>
<?php
include "footer.php";
?>