<?php
    include "header.php";
?>
<h2>Histori Transaksi</h2>
<table class="table table-hover table-striped">
<thead>
<th>NO</th><th>Tanggal Pembelian</th><th>Nama Produk</th><th>Status</th><th>Aksi</th>
</thead>
<tbody>
<?php
    include "koneksi2.php";
    $qry_transaksi=mysqli_query($conn,"select * from transaksi order by id_transaksi desc");
    $no=0;
    while($dt_transaksi=mysqli_fetch_array($qry_transaksi)){
    $no++;
    //menampilkan produk yang dibeli
    $produk_dibeli="<ol>";
    $qry_produk=mysqli_query($conn,"select * from detail_transaksi join produk on produk.id_produk=detail_transaksi.id_produk where id_transaksi ='".$dt_transaksi['id_transaksi']."'");
    while($dt_produk=mysqli_fetch_array($qry_produk)){
    $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
    }
    $produk_dibeli.="</ol>";

    //menampilkan status sudah kembali atau belum
    $qry_cek_kembali=mysqli_query($conn,"select * from pengembalian_buku where id_peminjaman_buku ='".$dt_histori['id_peminjaman_buku']."'");
    if(mysqli_num_rows($qry_cek_kembali)>0){
    $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
    $denda="denda Rp. ".$dt_kembali['denda'];

    $status_kembali="<label class='alert alert-success'>Sudah kembali <br>".$denda."</label>";

    $button_kembali="";
    } else {

    $status_kembali="<label class='alert alert-danger'>Belum kembali</label>";

    $button_kembali="<a href='kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"hello\")'>Kembalikan</a>";
    }
?>
<tr>

<td><?=$no?></td><td><?=$dt_transaksi['tgl_transaksi']?></td><td><?=$dt_transaksi['tgl_transaksi']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
</tr>
<?php
    }
?>
</tbody>
</table>
<?php
    include "footer.php";
?>