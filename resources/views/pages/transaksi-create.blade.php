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
                        <tbody>
                        <form action="index.php?module=pegawai" method="POST">
<select><?php include '.../../lib/database.php';
                $query=mysqli_query($koneksi,"select * from pegawai");?>
                    <option value='<?php echo $data['id'] ?>'><?php while($query){
                        echo $data['id'];
                            } 
                     ?></option></select>
<input type="text" placeholder="Jenis Kelamin" id="jenis" name="jenis" required>
<input type="text" placeholder="Alamat" id="alamat" name="alamat" required>
<input type="text" placeholder="No Telp" id="notelp" name="notelp" required>
<input type="submit" class="btn btn-info" name="submit">
                        </tbody>
                    </table>
                    </div> 
            </div>
        </div>
    </div>
</div>
</div>