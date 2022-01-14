<?php
if($_POST){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $telfon=$_POST['telfon'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }elseif(empty($telfon)){
        echo "<script>alert('telfon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }else{
        include "koneksi2.php";
        $insert=mysqli_query($conn,"insert into pelanggan (nama,alamat,gender,telfon) value ('".$nama."','".$username."','".$password."','".$alamat."','".$gender."','".$telfon."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>