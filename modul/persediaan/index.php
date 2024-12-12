<div class="border-bottom d-flex justify-content-between py-3">
    <h4>Data Persediaan</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="bi bi-plus"></i> Tambah Persediaan</button>
        <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Persediaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="modul/persediaan/proses.php?aksi=stok-awal" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="barang" class="form-label">Barang</label>
                            <select name="barang" class="form-select">
                                <option value="" disabled selected>Pilih Barang</option>
                                <?php
                                    $sql_barang = "SELECT * FROM barang WHERE id_barang NOT IN(SELECT id_barang FROM persediaan)";
                                    $result_barang = $mysqli->query($sql_barang);
                                    while($row_barang = $result_barang->fetch_assoc()){
                                    ?>
                                        <option value="<?= $row_barang['id_barang'];?>"><?= $row_barang['nama_barang'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stok_awal">Stok Awal</label>
                            <input type="number" name="stok_awal" class="form-control" placeholder="Contoh : 5" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Contoh : Masuk barang baru" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<table id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Stok Awal</th>
            <th>Stok Masuk</th>
            <th>Stok Keluar</th>
            <th>Stok Akhir</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_persediaan = "SELECT * FROM persediaan a INNER JOIN barang b ON a.id_barang=b.id_barang";
        $result_persediaan = $mysqli->query($sql_persediaan);
        $no=0;
        while($row_persediaan = $result_persediaan->fetch_assoc()){
            $no++;
        ?>
            <tr>
                <td><?= $no;?></td>
                <td><?= $row_persediaan['nama_barang'];?></td>
                <td><?= $row_persediaan['stok_awal'];?></td>
                <td><?= $row_persediaan['stok_masuk'];?></td>
                <td><?= $row_persediaan['stok_keluar'];?></td>
                <td><?= $row_persediaan['stok_akhir'];?></td>
                <td><?= $row_persediaan['deskripsi_persediaan'];?></td>
                <td>
                    <a class="text-decoration-none" href="" data-bs-toggle="modal" data-bs-target="#modalMasuk<?= $row_persediaan['id_persediaan'];?>">
                        <i class="bi bi-clipboard2-plus-fill"></i>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="modalMasuk<?= $row_persediaan['id_persediaan'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok Masuk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="modul/persediaan/proses.php?aksi=stok-masuk&id=<?= $row_persediaan['id_persediaan'];?>" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="barang" class="form-label">Barang</label>
                                            <input class="form-control bg-secondary-subtle" type="text" name="barang" value="<?= $row_persediaan['nama_barang'];?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="stok_masuk">Stok Masuk</label>
                                            <input type="number" name="stok_masuk" class="form-control" placeholder="Contoh : 5" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control" placeholder="Contoh : Penambahan barang" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="text-decoration-none" href="" data-bs-toggle="modal" data-bs-target="#modalKeluar<?= $row_persediaan['id_persediaan'];?>">
                        <i class="bi bi-clipboard2-minus-fill text-danger"></i>
                    </a>
                    <div class="modal fade" id="modalKeluar<?= $row_persediaan['id_persediaan'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Stok Keluar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="modul/persediaan/proses.php?aksi=stok-keluar&id=<?= $row_persediaan['id_persediaan'];?>" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="barang" class="form-label">Barang</label>
                                            <input class="form-control bg-secondary-subtle" type="text" name="barang" value="<?= $row_persediaan['nama_barang'];?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="stok_keluar">Stok Keluar</label>
                                            <input type="number" name="stok_keluar" class="form-control" placeholder="Contoh : 5" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control" placeholder="Contoh : Barang rusak" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>