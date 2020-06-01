<?php

include"koneksi.php";
$nis = $_GET['nis'];

$del = mysqli_query($conn, "DELETE FROM tbl_kelas_xiirpl3 WHERE nis = '$nis'");

if($del){
    echo "<script>alert('Data Berhasil dihapus')</script>";
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo "<script>alert('Data Gagal dihapus')</script>";
    echo "<script>window.location.href='index.php'</script>";
}

?>