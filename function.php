<?php 
$conec=mysqli_connect("localhost","root","","project");
// koneksi ke database

 function query($query) {
	global $conec;
	$result = mysqli_query($conec, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function hapus($id) {
	global $conec;
	mysqli_query($conec, "DELETE FROM kursus WHERE id = $id");
	return mysqli_affected_rows($conec);
}

function uploadbaru() {

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

function edit($data) {
  global $conec;

  $id = $data["id"];
  $name = htmlspecialchars($data["name"]);
  $thumbnaillama = htmlspecialchars($data["thumbnaillama"]);

 // cek apakah user pilih gambar baru atau tidak
	if( $_FILES['thumbnail']['error'] === 4 ) {
		$thumbnail = $thumbnaillama;
	} else {
		$thumbnail = uploadbaru();
	}

  $id_author = htmlspecialchars($data["id_author"]);
  $durasi = htmlspecialchars($data["durasi"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);

  $query = "UPDATE kursus SET
        name = '$name',
        thumbnail = '$thumbnail',
        id_author = '$id_author',
        durasi = '$durasi',
        deskripsi = '$deskripsi'
        WHERE id = $id
      ";
  // var_dump($query); die;
  mysqli_query($conec, $query);

  return mysqli_affected_rows($conec); 
}

// fungsi cari
function cari($keyword) {
	$query = "SELECT * FROM kursus
				WHERE
			  name LIKE '%$keyword%' OR
			  id_author LIKE '%$keyword%'
			";
	return query($query);
}

 // fungsi registrasi

function registrasi($data){

	global $conec;

	$nama = $data["nama"];
	$username = $data["username"];
	$password = mysqli_real_escape_string($conec, $data["password"]);
	$password2 = mysqli_real_escape_string($conec, $data["password2"]);


// ngcek username kalo sudah ada atau belum

	$result = mysqli_query($conec, "SELECT username FROM tb_user WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script> alert('username sudah terdaftar !')
		</script>";
		return false;
	}

// cek konfirmasi password
	if($password !== $password2){
		echo "<script>
		alert('password tidak sesuai');
		</script>";
		return false;
	}
// enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// menambah user ke database
mysqli_query($conec, "INSERT INTO  tb_user VALUES ('', '$nama','$username','password')");

return mysqli_affected_rows($conec);

	} 



 ?>

