<?php
    if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $telfon=$_POST['telfon'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else {
    include "koneksi2.php";
    if(empty($id_pelanggan)){
    $update=mysqli_query($conn,"update pelanggan set nama='".$nama."',username='".$username."',password='".$password."',alamat='".$alamat."',gender='".$gender."', telfon='".$telfon."' where id_pelanggan = '".$id_pelanggan."'") or
    die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
    }
    } else {
    $update=mysqli_query($conn,"update pelanggan set nama='".$nama."',username='".$username."',password='".$password."',alamat='".$alamat."',gender='".$gender."', telfon='".$telfon."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
    }
    }
    }
    }
?>