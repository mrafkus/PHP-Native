
<?php

require_once "radio-button.php";
require_once "bootstrap.php";

function navbar()
{
?>
	<nav class="navbar navbar-expand navbar-light" style="margin: 30px; background: 0%; margin-bottom: 50px;">
		<div class="container-fluid">
			<a class="navbar-brand" href="/Laundry/home.php" style="margin-right: 530px;">
				Logo
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mb-1 mb-lg-0">
					<?php if ($_SESSION["role"] === "Admin"): ?>
					<li class="nav-item" style="margin-left: -90px; color: rgb(29, 29, 29);">
						<a class="nav-link active" aria-current="page" href="/Laundry/home.php">Home</a>
					</li>
					<li class="nav-item dropdown" style="margin-left: 50px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Member
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: 50px;">
                            <li>
                                <a class="dropdown-item" href="/Laundry/member/tambah_member.php">Tambah</a>
                                <a class="dropdown-item" href="/Laundry/member/tampil.php">Tampil</a></li>
                            </li>
                        </ul>
                    </li>

					<li class="nav-item dropdown" style="margin-left: 50px; display: inline-block;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/Laundry/user/tambah_user.php">Tambah</a>
                                <a class="dropdown-item" href="/Laundry/user/tampil.php">Tampil</a></li>
                            </li>
                        </ul>
                    </li>

					<li class="nav-item dropdown" style="margin-left: 50px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Paket
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/Laundry/paket/tambah_paket.php">Tambah</a>
                                <a class="dropdown-item" href="/Laundry/paket/tampil.php">Tampil</a></li>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item dropdown" style="margin-left: 50px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Outlet
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/Laundry/outlet/tambah_outlet.php">Tambah</a>
                                <a class="dropdown-item" href="/Laundry/outlet/tampil.php">Tampil</a></li>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item dropdown" style="margin-left: 50px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/Laundry/transaksi/tambah_transaksi.php">Tambah</a>
                                <a class="dropdown-item" href="/Laundry/transaksi/tampil.php">Tampil</a></li>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/transaksi/laporan.php">Laporan</a>
					</li>
					<?php endif ?>
					
					<?php if ($_SESSION["role"] === "Kasir"): ?>
					<li class="nav-item" style="margin-left: 310px;">
						<a class="nav-link active" aria-current="page" href="/Laundry/home.php">Home</a>
					</li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/member/tampil.php">Member</a>
					</li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/transaksi/tambah_transaksi.php">Transaksi</a>
					</li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/transaksi/laporan.php">Laporan</a>
					</li>
					<?php endif ?>

					<?php if ($_SESSION["role"] === "Owner"): ?>
					<li class="nav-item" style="margin-left: 440px;">
						<a class="nav-link active" aria-current="page" href="/Laundry/home.php">Home</a>
					</li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/transaksi/tambah_transaksi.php">Transaksi</a>
					</li>
					<li class="nav-item" style="margin-left: 50px;">
						<a class="nav-link" href="/Laundry/transaksi/laporan.php">Laporan</a>
					</li>
					<?php endif ?>
				</ul>
				<ul class="navbar-nav mb-lg-0">
					<?php if (isset($_SESSION["id"])): ?>
					<li class="nav-item" style="margin-left: 50px;">
						<button type="submit" class="btn btn-rounded" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255); height: 40px;">
							<a class="nav-link" href="/Laundry/login.php" style="color: white; margin-top: -7px;">Login</a>
						</button>
					</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
<?php
}
?>