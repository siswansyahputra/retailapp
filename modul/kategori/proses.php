<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../../koneksi.php";
    $namakategori = $_POST['namakategori'];
    $status = $_POST['status'];
    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){
        $sql = "INSERT INTO kategori (nama_kategori,status)VALUES('$namakategori','$status')";
    }elseif($aksi == "edit"){
        $id = $_GET['id'];
        $sql = "UPDATE kategori SET nama_kategori='$namakategori', status='$status' WHERE id_kategori='$id'";
    }elseif($aksi == "hapus"){
        $id = $_GET['id'];
        $sql = "DELETE FROM kategori WHERE id_kategori='$id'";
    }
    $mysqli->query($sql);
}
header('location:../../dashboard.php?modul=kategori');