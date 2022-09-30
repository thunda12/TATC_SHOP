
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
background: linear-gradient(121deg, rgba(131,214,255,1) 26%, rgba(255,115,0,1) 100%);
    }
    </style>
<section class="vh-100 gradient-custom" id="Login" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase text-white">ลืมรหัสผ่าน</h2>
              <p class="text-white-50 mb-5">กรุณาใส่ รหัสผ่านใหม่ </p>
            <form action="sendEmail.php" method="POST">
              <div class="form-outline form-white mb-4">
                <input type="password" name="pass1" class="form-control form-control-lg" require/>
                <label class="form-label" for="typeEmailX" >รหัสผ่านใหม่</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" name="pass2" class="form-control form-control-lg" require/>
                <label class="form-label" for="typeEmailX" >ใส่รหัสผ่านใหม่อีกครั้ง</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>