<?php
include "utilities.php";

@session_start();

if ($_SESSION["level"] != "pelanggan" && $_SESSION["level"] != "kasir") {
	echo generate_redirect("akses_tidak_diterima.html");
}
?>