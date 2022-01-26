<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin"]);

require_once "../utility/utils.php";
require_once "../koneksi.php";

if ($_GET) {
	$id = $_GET["id"];

	if (!checkParams($id, "ID user")) {
		exit();
	}

	$query = mysqli_query($conn, "DELETE FROM `user` WHERE id = $id");

	if ($query) {
		warn("Berhasil menghapus user");
		redirectTo("tampil.php");
	} else {
		warn("Gagal menghapus user");
	}
}
?>