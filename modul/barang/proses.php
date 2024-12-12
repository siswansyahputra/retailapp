<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../../koneksi.php";
    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];
        $sql = "INSERT INTO barang (id_pemasok,nama_barang,merk,ukuran,satuan,id_kategori,harga_beli,harga_jual,deskripsi_barang) VALUES('$idpemasok','$namabarang','$merk','$ukuran','$satuan','$idkategori','$hargabeli','$hargajual','$deskripsi')";
    }elseif($aksi=="edit"){
        $id = $_GET['id'];
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];
        $sql = "UPDATE barang SET id_pemasok='$idpemasok', nama_barang='$namabarang', merk='$merk', ukuran='$ukuran',satuan='$satuan',id_kategori='$idkategori', harga_beli='$hargabeli', harga_jual='$hargajual', deskripsi_barang='$deskripsi' WHERE id_barang='$id'";
    }elseif($aksi == "hapus"){
        $id = $_GET['id'];
        $sql = "DELETE FROM barang WHERE id_barang='$id'";
    }
    $mysqli->query($sql);
}
header('location:../../dashboard.php?modul=barang');