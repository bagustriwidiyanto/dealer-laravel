<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Data Sepeda Motor</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Merek</th>
                            <th>Jenis</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php
    include ".../../lib/database.php";
    if(isset($_POST["submit"])){
        $merek = $_POST["merek"]; 
        $jenis = $_POST["jenis"]; 
        $warna = $_POST["warna"];
        $harga = $_POST["harga"];
    $create = mysqli_query($koneksi,"insert into sepeda_motor(merek,jenis,warna,harga) values ('$merek','$jenis','$warna','$harga')");
    } ?>
                        <?php
                        if (isset($_GET['delete'])){
                            include '.../../lib/database.php';
                            $id = $_GET['id'];
                            $delete = mysqli_query($koneksi,"delete from sepeda_motor where id='$id'");
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
                            $merek = $_POST['merek'];
                            $jenis = $_POST['jenis'];
                            $warna = $_POST['warna'];
                            $harga = $_POST['harga'];
                            $update = mysqli_query($koneksi, "update sepeda_motor set id='$id', merek='$merek', jenis='$jenis',warna='$warna',harga='$harga' where id='$id'") or die("error query");
                        if ($update){
                            echo '<div class="alert alert-success alert-dismissable">
                            <strong>Success!</strong> Berhasil update data.
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                          </div>';
                        }else {
                            echo '<div class="alert alert-danger"><strong>GAGAL !,</strong> Gagal update data.</div>';
                        }
                        }
                        $tampil = mysqli_query($koneksi,"select * from sepeda_motor");
                            while ($data = mysqli_fetch_assoc($tampil)){ ?>
                                <tr>
                                    <td><?php echo $data['id']?></td>
                                    <td><?php echo $data['merek']?></td>
                                    <td><?php echo $data['jenis']?></td>
                                    <td><?php echo $data['warna']?></td>
                                    <td><?php echo $data['harga']?></td>
                                    <td><a href="index.php?module=sepeda-edit&id=<?php echo $data['id']; ?>">Edit</a></td>
                                    <td><a href="index.php?module=sepeda&id=<?php echo $data['id'];?>&delete">Delete</a></td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <center><a href="index.php?module=sepeda-create" class="btn" role="button">+ Create New +</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>