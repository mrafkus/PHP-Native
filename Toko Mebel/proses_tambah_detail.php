<?php
if($_POST){
    $id_transaksi=$_POST['id_transaksi'];
    $id_produk=$_POST['id_produk'];
    $qty=$_POST['qty'];
    $subtotal=$_POST['subtotal'];

    if(empty($id_transaksi)){
        echo "<script>alert('id transaksi tidak boleh kosong');location.href='tambah_detail.php';</script>";
    }elseif(empty($id_produk)){
        echo "<script>alert('id produk tidak boleh kosong');location.href='tambah_detail.php';</script>";
    }elseif(empty($qty)){
        echo "<script>alert('quantity tidak boleh kosong');location.href='tambah_detail.php';</script>";
    }elseif(empty($subtotal)){
        echo "<script>alert('subtotal tidak boleh kosong');location.href='tambah_detail.php';</script>";
    }else{
        include "koneksi2.php";
        $insert=mysqli_query($conn,"insert into id_detail_transaksi (id_transaksi,id_produk,qty,subtotal) value ('".$id_transaksi."','".$id_produk."','".$qty."','".$subtotal."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan detail transaksi');location.href='tambah_detail.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan detail transaksi');location.href='tambah_detail.php';</script>";
        }
    }
}
?>