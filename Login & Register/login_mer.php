<?php 
    session_start();
    $errors = array();
    include '../connect.php';
    if(isset($_REQUEST['Login'])){
        $username = $_POST['MerUser'];
        $password = $_POST['Pass'];

        //var_dump($_POST);
    
        if(empty($username)){
            array_push($errors,"Username is required");
        }
        if(empty($password)){
            array_push($errors,"Password is required");
        }
        $hum = count($errors);

        if(count($errors) == 0){
          
            $password = md5($password);
            $query = "SELECT * FROM merchant WHERE Email = '$username' AND merPassword = '$password' ";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            // //var_dump(mysqli_num_rows($result));
            
            // echo'<pre>';
            // print_r($result);
            // var_dump($_POST);
            // var_dump($username) ; 
            // var_dump($password) ;
            // echo'</pre>';
            if($check = mysqli_num_rows($result) != 0){
            $_SESSION['mer_name'] = $row["Email"];
            $_SESSION['mer_id'] = $row["mer_Id"];   
            header("location: ../index.php");
            }else{
            echo mysqli_error($conn);            
            }
        }
          $conn -> close();
    }
?>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .gradient-custom {
            background: rgb(131,214,255);
            background: linear-gradient(121deg, rgba(131,214,255,1) 35%, rgba(0,73,167,0.9413515406162465) 100%);
    
          }
    </style>
<section class="vh-100 gradient-custom" id="Login" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase text-white">????????????????????????????????? ??????????????????</h2>
              <p class="text-white-50 mb-5">????????????????????? email ????????? password!</p>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
              <div class="form-outline form-white mb-4">
                <input type="email" name="MerUser" class="form-control form-control-lg" require/>
                <label class="form-label" for="typeEmailX" >Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="Pass" class="form-control form-control-lg" require/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

                <!-- Forgot password -->
              <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
                <!-- END Forgot password -->

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="Login">Login</button>
              </form>
              <!-- WEB2.0 -->
              <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div> -->
                <!--END WEB2.0 -->
            </div>
            <div class="row">
                  <div class="col-sm-6">
                    <p class="mb-0">Don't have an account? 
                      <a href="mer_register.php" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
                  <div class="col-sm-6">
                    <p class="mb-0">?????????????????????????????????? <br>
                      <a href="mer_forgot_password.php" class="text-white-50 fw-bold">Reset</a>
                    </p>
                  </div>
            </div>
            <div>
              <p class="mb-0">???????????????????????????????????????????????????????????????
                <a href="Login.php" class="text-white-50 fw-bold">click</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>