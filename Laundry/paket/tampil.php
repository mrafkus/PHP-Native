<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive("Admin");

require_once "../componen/bootstrap.php";
require_once "../componen/navbar.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">

	<?php bootstrap_css(); ?>

	<title>List Paket Laundry</title>
</head>

<body>

	<?php navbar(); ?>

	<main class="crud-form">
		<h1 style="margin-bottom: 20px;">List Paket</h1>

		<a href="tambah_paket.php" class="btn btn-primary mt-3" id="add-anchor" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">+ Tambah Paket</a>

		<?php
		require_once "../koneksi.php";

		$query = mysqli_query($conn, "SELECT * FROM `paket`");

		list_table($query);
		?>

	</main>

    <?php
        function extract_as_table_data($data, $converters = null)
        {
            foreach ($data as $key => $value) {
                if ($key === "id") continue;

                $content = isset($converters[$key]) ? $converters[$key]($value) : titleize($value);
        ?>
                <td><?= $content ?></td>
            <?php
            }
        }

        function list_table($mysqli_result, $converters = null)
        {
            ?>
            <table class="table table-striped table-borderless mt-3">
                <thead>
                    <tr>
                        <th> No </th>
                        <?php foreach (mysqli_fetch_fields($mysqli_result) as $field) : if ($field->name === "id") continue; ?>
                            <th scope="col"> <?= ucwords(str_replace("_", " ", $field->name)) ?> </th>
                        <?php endforeach; ?>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;

                    while ($data = mysqli_fetch_assoc($mysqli_result)) {
                        ++$no;
                    ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <?php extract_as_table_data($data, $converters); ?>
                            <td>
                                <a class="btn btn-primary" class="edit-anchor" href="ubah.php?id=<?= $data["id"] ?>" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">Ubah</a>
                                <span>|</span>
                                <a class="btn btn-danger" class="remove-anchor" href="hapus.php?id=<?= $data["id"] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    <?php
        }
    ?>
	<?php bootstrap_js(); ?>

</body>

</html>