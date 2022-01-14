<?php
if($_POST){
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $telpon=$_POST['telpon'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_member.php';</script>";
    }elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_member.php';</script>";
    }elseif(empty($jenis_kelamin)){
        echo "<script>alert('jenis kelamin tidak boleh kosong');location.href='tambah_member.php';</script>";
    }elseif(empty($telpon)){
        echo "<script>alert('telpon tidak boleh kosong');location.href='tambah_member.php';</script>";
    }else{
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into member (nama,alamat,jenis_kelamin,telpon) value ('".$nama."','".$alamat."','".$jenis_kelamin."','".$telpon."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan member');location.href='tambah_member.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan member');location.href='tambah_member.php';</script>";
        }
    }
}
?>