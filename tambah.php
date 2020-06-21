
<?php

$conec=mysqli_connect("localhost","root","","project");
function tambah($data) {
  global $conec;

  $name = htmlspecialchars($data["name"]);
// upload gambar
  $thumbnail = upload();
  if( !$thumbnail ) {
    return false;
  }

  $id_author = htmlspecialchars($data["id_author"]);
  $durasi = htmlspecialchars($data["durasi"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);


  $query = "INSERT INTO kursus
        VALUES
        ('', '$name', '$thumbnail', '$id_author', '$durasi', '$deskripsi')
      ";
  mysqli_query($conec, $query);

  return mysqli_affected_rows($conec);
}

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
  
  // cek apakah data berhasil di tambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
      <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
      </script>
    ";
  }
}

function upload() {

  $namaFile = $_FILES['thumbnail']['name'];
  $ukuranFile = $_FILES['thumbnail']['size'];
  $error = $_FILES['thumbnail']['error'];
  $tmpName = $_FILES['thumbnail']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if( $error === 4 ) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if( $ukuranFile > 1000000 ) {
    echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <div class="modal-body">
             <div class="form-group">
                  <label class="control-label" >Nama </label>
                    <input type="text" name="name" class="form-control" required="">
        </div> 
        <div class="form-group">
                  <label> Thumbnail </label>
                    <input type="file" name="thumbnail" class="form-control" required="">
        </div>
        <div class="form-group">
                  <label class="control-label" >Author </label>
                    <input type="text" name="id_author" class="form-control" required="">
        </div>
        <div class="form-group">
                  <label class="control-label" >Durasi </label>
                    <input type="text" name="durasi" class="form-control" required="">
        </div>
        <div class="form-group">
                  <label class="control-label" >Deskripsi </label>
                    <input type="text" name="deskripsi" class="form-control" required="">
        </div>                      
            </div>
                </div>

      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" >Reset</button>
        <button type="submit" name="submit" class="btn btn-dark">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>

