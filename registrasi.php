<?php include "template/header.php" ?>
<?php include "template/footer.php" ?>

<?php 
require 'function.php'; 

if(isset($_POST["register"]) ){
  
  if (registrasi($_POST) > 0) {
    echo "<script>
    alert('user baru berhasil ditambahkan');
    </script>";
    
  }else{
    echo mysqli_error($conec);
  }

}

 ?>


<body class="bg-gradient-">

  <div class="container">

    <div class="card-register o-hidden border-0 shadow-lg  col-lg-6 my-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
              </div>
              <form method="post" action="" class="user">
                
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama" name="nama" required="nama harus diisi">
                  
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="username" placeholder="Email " name="username" required="">
                                  </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required="">
                                      </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi Password" name="password2" required="">
                  </div>
                </div>
                <button type="submit" name="register" class="btn btn-dark btn-user btn-block" required="" >Buat Akun</button>
                <hr>
              </form>
              
              <div class="text-center">
                <a class="small" href="login.php">Sudah Punya Akun? Silahkan Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

