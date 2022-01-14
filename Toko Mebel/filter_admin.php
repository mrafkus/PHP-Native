<?php
include "utilities.php";

session_start();

if ($_SESSION["level"] != "admin") {
	echo generate_redirect("akses_tidak_diterima.html");
	header("location: akses_tidak_diterima.html");
}
?>