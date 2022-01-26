<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir"]);

require_once "../utility/utils.php";
require_once "../koneksi.php";

if ($_GET) {
	$id = $_GET["id"];

	if (!checkParams($id, "ID member")) {
		exit();
	}

	$query = mysqli_query($conn, "DELETE FROM `member` WHERE id = $id");

	if ($query) {
		warn("Berhasil menghapus member");
		redirectTo("tampil.php");
	} else {
		warn("Gagal menghapus member");
	}
}
?>