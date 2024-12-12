<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "../../koneksi.php";
    $namapemasok = $_POST['namapemasok'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];
    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){
        $sql = "INSERT INTO pemasok (nama_pemasok,alamat,telepon,status)VALUES('$namapemasok','$alamat','$telepon','$status')";
    }elseif($aksi == "edit"){
        $id = $_GET['id'];
        $sql = "UPDATE pemasok SET nama_pemasok='$namapemasok', alamat='$alamat', telepon='$telepon', status='$status' WHERE id_pemasok='$id'";
    }elseif($aksi == "hapus"){
        $id = $_GET['id'];
        $sql = "DELETE FROM pemasok WHERE id_pemasok='$id'";
    }
    $mysqli->query($sql);
}
header('location:../../dashboard.php?modul=pemasok');