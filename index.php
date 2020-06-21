<?php include "template/header.php" ?>
<?php include "template/footer.php" ?>
<?php include "template/sidebar.php" ?>
<?php include "tambah.php" ?>


<?php 
require 'function.php';

$krs = query("SELECT * FROM kursus");

if( isset($_POST["cari"]) ) {
  $krs = cari($_POST["keyword"]);
}


?>




<!-- Button trigger modal -->
<div class="container">
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  <i>Tambah Data</i>
</button>
</div>

<!-- Modal -->
<br>
<div class="container-dua">
<?php foreach ($krs as $row) :  ?>
<div class="card ml-3 mb-3" >
  <img src="img/<?= $row["thumbnail"]; ?>" class="card-img-top"  alt="...">
  <div class="card-body">

    <h5 class="card-title"><?= $row["name"]; ?></h5>
    <p class="card-text">Durasi : <?= $row["durasi"]; ?></p>
    <p class="card-text">Deskripsi : <?= $row["deskripsi"]; ?></p>
    <a href="#" class="btn btn-primary">Detail</a>
    <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-warning" >Edit</a>
    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"  class="btn btn-danger">Hapus</a>
  </div>
</div>
<?php endforeach; ?>
</div>

