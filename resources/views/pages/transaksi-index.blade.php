<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Data Transaksi</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>ID Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>ID Sepeda</th>
                            <th>Merek Sepeda</th>
                            <th>Jenis Sepeda</th>
                            <th>Harga Sepeda</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead> 
                        <tbody>
                        <!-- Proses Input Data -->
                        <?php
    include ".../../lib/database.php";
    if(isset($_POST["submit"])){
        $id_pegawai = $_POST["id_pegawai"];
        $nama_pegawai = $_POST["nama_pegawai"];
        $id_pelanggan = $_POST["id_pelanggan"];
        $nama_pelanggan = $_POST["nama_pelanggan"];
        $id_sepeda = $_POST["id_sepeda"];
        $merek_sepeda = $_POST["merek_sepeda"];
        $jenis_sepeda = $_POST["jenis_sepeda"];
        $harga_sepeda = $_POST["harga_sepeda"];
    $create = mysqli_query($koneksi,"insert into transaksi(pegawai_id,pegawai_nama,pelanggan_id,pelanggan_nama,sepeda_id,sepeda_merek,sepeda_jenis,harga) values ($id_pegawai ,$nama_pegawai ,$id_pelanggan ,$nama_pelanggan ,$id_sepeda ,$merek_sepeda ,$jenis_sepeda ,$harga_sepeda )");
    } ?> 
                            <!-- Proses Delete Data -->
                        <?php
                        if (isset($_GET['delete'])){
                            include '.../../lib/database.php';
                            $id = $_GET['id'];
                            $delete = mysqli_query($koneksi,"delete from transaksi where id='$id'");
                            if($delete){
                                ?>
                                <script> window.alert("Sukses hapus data")</script>
                                <?php
                            }
                            else{
                                ?>
                                <script> window.alert("Gagal hapus data")</script>
                                <?php
                            }
                        }?>
                                                <!-- Proses Edit Data -->
                        <?php
                        include '.../../lib/database.php';
                        if (isset($_POST['edit'])){
                            $id = $_GET['id'];
                            $nama = $_POST['nama'];
                            $jk = $_POST['jk'];
                            $alamat = $_POST['alamat'];
                            $notelp = $_POST['notelp'];
                            $update = mysqli_query($koneksi, "update pegawai set id='$id', nama='$nama', jenis_kelamin='$jk',alamat='$alamat',notelp='$notelp' where id='$id'") or die("error query");
                        if ($update){
                            echo '<div class="alert alert-success alert-dismissable">
                            <strong>Success!</strong> Berhasil update data.
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                          </div>';
                        }else {
                            echo '<div class="alert alert-danger"><strong>GAGAL !,</strong> Gagal update data.</div>';
                        }
                        }
                        ?>
                                                <!-- Proses Read Data -->
                        <?php
                        $tampil = mysqli_query($koneksi,"select * from pegawai");
                            while ($data = mysqli_fetch_assoc($tampil)){ ?>
                                <tr>
                                    <td><?php echo $data['id']?></td>
                                    <td><?php echo $data['nama']?></td>
                                    <td><?php echo $data['jenis_kelamin']?></td>
                                    <td><?php echo $data['alamat']?></td>
                                    <td><?php echo $data['notelp']?></td>
                                    <td><a href="index.php?module=pegawai-edit&id=<?php echo $data['id']; ?>">Edit</a></td>
                                    <td><a href="index.php?module=pegawai&id=<?php echo $data['id'];?>&delete">Delete</a></td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <center><a href="index.php?module=pegawai-create" class="btn" role="button">+ Create New +</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>