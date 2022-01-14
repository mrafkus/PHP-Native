<?php 
	include "header.php"; 
?>
<div class="container-fluid px-5">
	<div class="col">
		<?php
		if ($_SESSION["level"] == "pelanggan") :?>
			<h4>Beranda</h4>
			<ul>
				<li><a href="perangkat.php">Perangkat</a></li>
				<li><a href="histori.php">Histori</a></li>
			</ul>
		<?php 
			if ($_SESSION["level"] == "admin") : ?>
			<h3 class="mt-4 mb-3"> Tampilan Admin </h3>
			<ul>
				<li><a href="tampil_pelanggan.php">Pelanggan</a></li>
				<li><a href="tampil_petugas.php">Petugas</a></li>
				<li><a href="tampil_produk.php">Produk</a></li>
			</ul>

			<h4>Penambahan</h4>
			<ul>
				<li><a href="tambah_pelanggan.php">Pelanggan</a></li>
				<li><a href="tambah_petugas.php">Petugas</a></li>
				<li><a href="tambah_produk.php">Produk</a></li>
			</ul>
		<?php
			endif 
		?>

		<?php if ($_SESSION["level"] == "kasir") : ?>
			<h4>Penambahan</h4>
			<ul>
				<li><a href="tambah_pelanggan.php">Pelanggan</a></li>
				<li><a href="tambah_transaksi.php">Transaksi</a></li>
			</ul>
		<?php endif ?>
	</div>
</div>
<?php include "footer.php" ?>