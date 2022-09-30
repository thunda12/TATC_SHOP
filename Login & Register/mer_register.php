<?php 
    session_start();
    $errors = array();
    include '../connect.php';

    if(isset($_REQUEST['Register'])){
        $cusIdCard = $_POST['cusIdCard'];
        $email = $_POST['Email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password01 = $_POST['password01'];
        $password02 = $_POST['password02'];

        //var_dump($_POST);
    

        if(empty($username)){
            array_push($errors,"Username is required");
        }
        if(empty($password01)){
            array_push($errors,"Password is required");
        }
        if(empty($cusIdCard)){
            array_push($errors,"ID CARD is required");
        }
        if($password01 != $password02){
            array_push($errors, "the two password not match");
        }

        
        $check = "SELECT * FROM customer WHERE username = '$username' OR cusIdCard = '$cusIdCard'";
        $query = mysqli_query($conn, $check);
        $result = mysqli_fetch_assoc($query);
        if($result){
            if($result['username'] === $username){
                array_push($errors,"username already exists");
            }
            if($result['cusIdCard'] === $cusIdCard){
                array_push($errors,"username already exists");
            }
        }

        //echo count($errors);
        if(count($errors)==0){
            $password = md5($password01);
            $querySQL = "INSERT INTO merchant(merIdCard,phoneNumber,Email,merPassword)
                VALUE ('$cusIdCard','$phoneNumber','$email','$password')";
            mysqli_query($conn,$querySQL);
            $_SESSION['success'] = "Your are logged in" ;
            echo "<script> window.location.href='login_mer.php'; 
                alert('สมัครสมาชิกเรียบร้อย');
                </script>";


        }
        
        
          
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
        body {
        background: rgb(131,214,255) repeat;
        background: linear-gradient(121deg, rgba(131,214,255,1) 35%, rgba(0,73,167,0.9413515406162465) 100%) repeat;
        background-attachment: fixed;
    }
    </style>
<body>
<section class="vh-100 " id="Login" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase text-white">สมัครเป็นพ่อค้า</h2>
              <p class="text-white-50 mb-5"></p>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
              <div class="form-outline form-white mb-4">
                <input type="email" name="Email" class="form-control form-control-lg" require/>
                <label class="form-label" for="typeEmailX" >Email</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" name="cusIdCard" class="form-control form-control-lg" placeholder="กรุณาใส่ตามบัตรจริง" require/>
                <label class="form-label" for="typePasswordX">รหัสบัตรประชาชน</label>
              </div>              
              <div class="form-outline form-white mb-4">
                <input type="text" name="phoneNumber" class="form-control form-control-lg" require/>
                <label class="form-label" for="typePasswordX">เบอร์โทร</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" name="password01" class="form-control form-control-lg" require/>
                <label class="form-label" for="typePasswordX">รหัสผ่าน</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" name="password02" class="form-control form-control-lg" require/>
                <label class="form-label" for="typePasswordX">ยืนยัรหัสผ่านอีกครั้ง</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="Register">Register</button>
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
                    <p class="mb-0">สมัครสมาชิก? 
                      <a href="cus_register.php" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
                  <div class="col-sm-6">
                    <p class="mb-0">ลืมรหัสผ่าน? <br>
                      <a href="forgot_password.php" class="text-white-50 fw-bold">Reset</a>
                    </p>
                  </div>
            </div>
            <div>
              <p class="mb-0">สมัครเป็นลูกค้า 
                <a href="login_mer.php" class="text-white-50 fw-bold">click</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
