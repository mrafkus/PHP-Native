<?php
    if($_POST){
    $id_member=$_POST['id_member'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $telpon=$_POST['telpon'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($telpon)){
        echo "<script>alert('telpon tidak boleh kosong');location.href='ubah_member.php';</script>";
    } else {
    include "koneksi.php";
    if(empty($id_member)){
    $update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',telpon='".$telpon."' where id_member = $id_member") or
    die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses ngab!');location.href='tampil_member.php';</script>";
    } else {
        echo "<script>alert('Gagal ngab!');location.href='ubah_member.php?id_member=".$id_member."';</script>";
    }
    } else {
    $update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',telpon='".$telpon."' where id_member = $id_member") or die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses ngab!');location.href='tampil_member.php';</script>";
    } else {
        echo "<script>alert('Gagal ngab!');location.href='ubah_member.php?id_member=".$id_member."';</script>";
    }
    }
    }
    }
?>