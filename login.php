<?php include "template/header.php" ?>
<?php include "template/footer.php" ?>

<?php 
 // session_start();
require 'function.php';
if(isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
$result =mysqli_query($conec, "SELECT * FROM tb_user WHERE username = '$username'");

if(mysqli_num_rows($result) === 1 ) {
	$row = mysqli_fetch_assoc($result);
	if(password_verify($password, $row["password"]) ) {
		header("Location: index.php");
		exit;

			}
}
}
?>


<body class="bg-gradient">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                  </div>

                  
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="username" name="username"   placeholder="Masukan email" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password"  id="password" placeholder="Password" required="">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-dark btn-user btn-block" required="" >Login</button>
                    <hr>
                    </form>
                  <hr>
                 

                                    <div class="text-center">
                    <a class="small" href="registrasi.php">Belum Punya Akun ? Silahkan Registrasi !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  
