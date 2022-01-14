<?php
    if($_POST){
    $id_produk=$_POST['id_produk'];
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $bahan=$_POST['bahan'];
    $harga=$_POST['harga'];
    $foto_produk=$_POST['foto_produk'];

    if(empty($nama_produk)){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='ubah_produk.php';</script>";
    } elseif(empty($foto_produk)){
        echo "<script>alert('foto produk tidak boleh kosong');location.href='ubah_produk.php';</script>";
    } else {
    include "koneksi2.php";
    if(empty($id_produk)){
    $update=mysqli_query($conn,"update produk set nama_produk='".$nama_produk."',deskripsi='".$deskripsi."',bahan='".$bahan."', harga='".$harga."', foto_produk='".$foto_produk."' where id_produk = '".$id_produk."' ") or
    die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses update produk');location.href='tampil_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal update produk');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
    }
    } else {
    $update=mysqli_query($conn,"update produk set nama_produk='".$nama_produk."',deskripsi='".$deskripsi."',bahan='".$bahan."', harga='".$harga."', foto_produk='".$foto_produk."' where id_produk = '".$id_produk."' ") or die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses update produk');location.href='tampil_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal update produk');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
    }
    }
    }
    }
?>