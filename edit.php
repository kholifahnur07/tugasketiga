<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruangku</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   
</head>

<body>

<?php

include"koneksi.php";
$nis = $_GET['nis'];

$query ="SELECT * FROM tbl_kelas_xiirpl3 WHERE nis = '$nis'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);
$jenis = $data['jenis_kelammin'];

?>
    
<div class="container" style="margin: 20px auto; width: 50%;">
   <div class="panel panel-default">
       <div class="panel-body">
       <form action="" method="post">
                <div class="form-group">
                   <label for="nis">NIS</label>
                   <input readonly required value="<?php echo $data['nis']; ?>" type="number" class="form-control" name="nis" id="nis" placeholder="NIS....">
                </div>
                <div class="form-group">
                   <label for="nama">Nama Siswa</label>
                   <input required value="<?php echo $data['nama']; ?>" type="text" class="form-control" name="nama" id="nama" placeholder="Nama Siswa...">
                </div>
                <div class="form-group">
                   <label for="jk">Jenis Kelamin</label>
                  <select required class="form-control" name="jk">
                     <option value="">Pilih Jenis Kelamin</option>
                     <option <?php if($jenis=="Laki-laki"){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                     <option <?php if($jenis=="Perempuan"){echo "selected";} ?> value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                   <label required for="alamat">Alamat</label>
                   <textarea name="alamat" class="form-control" rows="3"><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="modal-footer">
          <button type="reset" class="btn btn-default btn-sm" data-dismiss="modal" onclick="goBack()" >Cancel</button>
          <button type="submit" name="edit" class="btn btn-primary btn-sm">Simpan</button>
          </div>
          </form>
       </div>
   </div>
</div>





<script> function goBack() { window.history.back();}</script>

<script src="assets/jquery/jquery-3.3.1.slim.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>


<?php

if(isset($_POST['edit'])){
   $nis = $_POST['nis'];
   $nama = $_POST['nama'];
   $jk = $_POST['jk'];
   $alamat = $_POST['alamat'];

   $query = "UPDATE tbl_kelas_xiirpl3 SET nama='$nama', jenis_kelammin='$jk', alamat ='$alamat' WHERE nis = '$nis'";
   $sql = mysqli_query($conn, $query);

   if($sql){
       echo "<script>alert('Data Berhasil diedit')</script>";
       echo "<script>window.location.href='index.php'</script>";
   }else{
       echo "<script>alert('Data Gagal diedit')</script>";
       echo "<script>window.location.href='index.php'</script>";
   }
}

?>