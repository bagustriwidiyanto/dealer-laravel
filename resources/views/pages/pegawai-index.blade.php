<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Data Pegawai</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php 
    include ".../../lib/database.php";
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $jk = $_POST["jenis"];
        $alamat = $_POST["alamat"];
        $no = $_POST["notelp"];
    $create = mysqli_query($koneksi,"insert into pegawai(nama,jenis_kelamin,alamat,notelp) values ('$nama','$jk','$alamat','$no')");
    } ?>
                        <?php
                        if (isset($_GET['delete'])){
                            include '.../../lib/database.php';
                            $id = $_GET['id'];
                            $delete = mysqli_query($koneksi,"delete from pegawai where id='$id'");
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
                        }
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
                        $tampil = mysqli_query($koneksi,"select * from pegawai");
                            while ($data = mysqli_fetch_assoc($tampil)){ ?>
                                <tr>
                                    <td><?php echo $data['id']?></td>
                                    <td><?php echo $data['nama']?></td>
                                    <td><?php echo $data['alamat']?></td>
                                    <td><?php echo $data['jenis_kelamin']?></td>
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