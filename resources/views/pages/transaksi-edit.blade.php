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
                        <?php
                    include ".../../lib/database.php";
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'");
                    $data = mysqli_fetch_assoc($query);
                    echo '<form action="index.php?module=pegawai&id='.$id.'" method="POST">'
                    ?>
                    <table>
                    <tr><td>ID</td><td><input type="text" name="id" value="<?php echo $data['id'];?>" disabled></td></tr>
                    <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td></tr>
                    <tr><td>Jenis Kelamin</td><td><input type="text" name="jk" value="<?php echo $data['jenis_kelamin'];?>"></td></tr>
                    <tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo $data['alamat'];?>"></td></tr>    
                    <tr><td>No Telp</td><td><input type="text" name="notelp" value="<?php echo $data['notelp'];?>"></td></tr>
                    <tr><td colspan=2><input type="submit" class="btn btn-info btn-block" name='edit'>
                    </form>
                    </tbody>
                    </table>
                    </div> 
            </div>
        </div>
    </div>
</div>
</div>