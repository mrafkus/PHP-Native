<?php
if($_POST){
    $id_transaksi=$_POST['id_transaksi'];
    $id_pelanggan=$_POST['id_pelanggan'];
    $id_petugas=$_POST['id_petugas'];
    $tgl_transaksi=$_POST['tgl_transaksi'];

    if(empty($id_transaksi)){
        echo "<script>alert('id transaksi tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($id_pelanggan)){
        echo "<script>alert(''id pelanggan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($id_petugas)){
        echo "<script>alert('id petugas tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }else{
        include "koneksi2.php";
        $insert=mysqli_query($conn,"insert into transaksi (id_transaksi,id_pelanggan,id_petugas,tgl_transaksi) value ('".$id_transaksi."','".$id_pelanggan."','".$id_petugas."','".$tgl_transaksi."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_transaksi.php';</script>";
        }
    }
}
?>