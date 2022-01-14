<?php
include "utilities.php";

@session_start();

if ($_SESSION["level"] != "kasir" && $_SESSION["level"] != "admin") {
	echo generate_redirect("akses_tidak_diterima.html");
}
?>