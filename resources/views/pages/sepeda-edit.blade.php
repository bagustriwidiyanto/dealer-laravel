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
                        <tbody>
                        <?php
                    include ".../../lib/database.php";
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM sepeda_motor WHERE id='$id'");
                    $data = mysqli_fetch_assoc($query);
                    echo '<form action="index.php?module=sepeda&id='.$id.'" method="POST">'
                    ?>
                    <table>
                    <tr><td>ID</td><td><input type="text" name="id" value="<?php echo $data['id'];?>" disabled></td></tr>
                    <tr><td>Merek</td><td><input type="text" name="merek" value="<?php echo $data['merek'];?>"></td></tr>
                    <tr><td>Jenis</td><td><input type="text" name="jenis" value="<?php echo $data['jenis'];?>"></td></tr>
                    <tr><td>Warna</td><td><input type="text" name="warna" value="<?php echo $data['warna'];?>"></td></tr>    
                    <tr><td>Harga</td><td><input type="text" name="harga" value="<?php echo $data['harga'];?>"></td></tr>
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