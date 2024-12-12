<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../../koneksi.php";
    $aksi = $_GET['aksi'];
    if($aksi == "stok-awal"){
        $barang = $_POST['barang'];
        $stokawal = $_POST['stok_awal'];
        $deskripsi = $_POST['deskripsi'];

        $sql = "INSERT INTO persediaan (id_barang,stok_awal,stok_masuk,stok_keluar,stok_akhir,deskripsi_persediaan) VALUES('$barang','$stokawal',0,0,'$stokawal','$deskripsi')";
    }elseif($aksi == "stok-masuk"){
        $idpersediaan = $_GET['id'];

        $sql_persediaan = "SELECT * FROM persediaan WHERE id_persediaan=$idpersediaan";
        $result_persediaan = $mysqli->query($sql_persediaan);
        $row_persediaan = $result_persediaan->fetch_assoc();

        $stokmasuk = $_POST['stok_masuk'];
        $deskripsi = $_POST['deskripsi'];
        $stokawal = $row_persediaan['stok_akhir'];
        $stokakhir = $row_persediaan['stok_akhir'] + $stokmasuk;

        $sql = "UPDATE persediaan SET stok_awal='$stokawal', stok_masuk='$stokmasuk', stok_keluar=0, stok_akhir='$stokakhir', deskripsi_persediaan='$deskripsi' WHERE id_persediaan='$idpersediaan'";
    }elseif($aksi == "stok-keluar"){
        $idpersediaan = $_GET['id'];

        $sql_persediaan = "SELECT * FROM persediaan WHERE id_persediaan=$idpersediaan";
        $result_persediaan = $mysqli->query($sql_persediaan);
        $row_persediaan = $result_persediaan->fetch_assoc();

        $stokkeluar = $_POST['stok_keluar'];
        $deskripsi = $_POST['deskripsi'];
        $stokawal = $row_persediaan['stok_akhir'];
        $stokakhir = $row_persediaan['stok_akhir'] - $stokkeluar;

        $sql = "UPDATE persediaan SET stok_awal='$stokawal', stok_masuk=0, stok_keluar='$stokkeluar', stok_akhir='$stokakhir', deskripsi_persediaan='$deskripsi' WHERE id_persediaan='$idpersediaan'";
    }
    $mysqli->query($sql);
}
header('location:../../dashboard.php?modul=persediaan');
?>