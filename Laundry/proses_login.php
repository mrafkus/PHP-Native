<?php
include "utils.php";

redirectTo ("home.php");

if ($_POST) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username)) {
		echo generate_alert_message("username tidak boleh kosong");
		echo $redirect_to_url;
	} elseif (empty($password)) {
		echo generate_alert_message("password tidak boleh kosong");
		echo $redirect_to_url;
	} else {
		include "koneksi.php";

		$query = "SELECT * FROM user WHERE username = ? and password = ?";

		if ($stmt = $conn->prepare($query)) {
			$stmt->bind_param("ss", $username, md5($password));
			$stmt->execute();

			if ($stmt->error) {
				die("Error: " . htmlspecialchars($stmt->error) . "\n");
			}
			
			$stmt->store_result();

			$stmt->bind_result($id, $nama_user, $_username, $_password, $role);

			if ($stmt->num_rows() > 0) {
				session_start();

				$stmt->fetch();
				$_SESSION['id'] = $id;
				$_SESSION['nama_user'] = $nama_user;
				$_SESSION['username'] = $_username;
				$_SESSION['role'] = $role;

				header("location: home.php");
			} else {
				echo generate_alert_message("Username dan password tidak benar");
				echo generate_redirect("login.php");
			}

			$stmt->close();
		} else {
			die("Failed to prepare() statement: " . $conn->error);
		}

		echo generate_alert_message("Berhasil login!");
		echo generate_redirect("home.php");

		$conn->close();
	}
}