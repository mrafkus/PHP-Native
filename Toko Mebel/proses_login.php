<?php
include "utilities.php";

$redirect_to_url = generate_redirect("login.php");

if ($_POST) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username)) {
		echo generate_alert_message("Username tidak boleh kosong");
		echo $redirect_to_url;
	} elseif (empty($password)) {
		echo generate_alert_message("Password tidak boleh kosong");
		echo $redirect_to_url;
	} else {
		include "koneksi2.php";

		$query = "SELECT * FROM petugas WHERE username = ? and password = ?";

		if ($stmt = $conn->prepare($query)) {
			$stmt->bind_param("ss", $username, md5($password));
			$stmt->execute();

			if ($stmt->error) {
				die("Error: " . htmlspecialchars($stmt->error) . "\n");
			}
			
			$stmt->store_result();

			$stmt->bind_result($id_petugas, $nama_petugas, $_username, $_password, $level);

			if ($stmt->num_rows() > 0) {
				session_start();

				$stmt->fetch();
				$_SESSION['id_petugas'] = $id_petugas;
				$_SESSION['nama_petugas'] = $nama_petugas;
				$_SESSION['level'] = $level;

				header("location: home.php");
			} else {
				echo generate_alert_message("Username dan password tidak benar");
				echo generate_redirect("login.php");
			}

			$stmt->close();
		} else {
			die("Failed to prepare() statement: " . $conn->error);
		}

		echo generate_alert_message("Berhasil login.");
		echo generate_redirect("home.php");

		$conn->close();
	}
}