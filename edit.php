<?php 
require 'template/header.php';
require 'template/footer.php';
require 'template/sidebar.php';
require 'function.php';

$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$krs = query("SELECT * FROM kursus WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
  
  // cek apakah data berhasil diubah atau tidak
  if( edit($_POST) > 0 ) {
    echo "
      <script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  }


}

?>

<h1 align="center">Edit data</h1>
<div class="container">
  
<form action="" method="post" enctype="multipart/form-data" >
  <input type="hidden" name="id" value="<?= $krs["id"]; ?>">
  <input type="hidden" name="thumbnaillama" value="<?= $krs["thumbnail"]; ?>">
        <div class="form-group">
          <div class="modal-body">
             <div class="form-group">
                  <label class="control-label" >Nama </label>
                    <input type="text" name="name" class="form-control" value="<?= $krs["name"]; ?>" required="">
        </div> 
        <div class="form-group">
                  <label> Thumbnail </label><br>
                  <div class="card ml-3 mb-3" style="width:350px" >
                   <img src="img/<?= $krs["thumbnail"]; ?>" class="card-img-top" width="300" height="150"  alt="...">
                    <div class="card-body">

                  <input type="file" name="thumbnail" class="form-control" > 
        </div>
        </div>
        </div>
        <div class="form-group">
                  <label class="control-label" >Author </label>
                    <input type="text" name="id_author" class="form-control" value="<?= $krs["id_author"]; ?>" required="">
        </div>
        <div class="form-group">
                  <label class="control-label" >Durasi </label>
                    <input type="text" name="durasi" class="form-control" value="<?= $krs["durasi"]; ?>" required="">
        </div>
        <div class="form-group">
                  <label class="control-label" >Deskripsi </label>
                    <input type="text" name="deskripsi" class="form-control" value="<?= $krs["deskripsi"]; ?>" required="">
        </div>                      
            </div>
                </div>

      <div class="modal-footer">
        <a href="index.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
        <button type="submit" name="submit" class="btn btn-dark">Ubah</button>
      </form>
      </div>
