<?php

function generate_alert_message($message) {
	return "<script>alert('" . $message . "');</script>";
}

function generate_redirect($url) {
	return "<script>location.href='" . $url . "';</script>";
}

?>
