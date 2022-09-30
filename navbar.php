<?php
    $count=isset($_SESSION['cart.php']) ? count($_SESSION['cart']) : 0;
    if(isset($_SESSION['qty'])){
      $qty=0;
      foreach($_SESSION['qty'] as $item){
        @$qty=$qty+$item;
        // echo "<pre>";
        // var_dump($item) ;
        // echo "</pre>";
        // echo "<br>";
    }
    }else{
      $qty=0;
    }
?>
    <style>
        #navbarCollapse{
            position: relative;
        }
        #logo{
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <!-- <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div> -->

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" 
        style="background: linear-gradient(180deg, rgba(21,24,54,1) 35%, rgba(0,212,255,0) 100%);">
            
            <!-- <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto p-4 p-lg-0">
                    <?php if(!isset($_SESSION['mer_id'])){?>
                        <a href="index.php?select=cart" class="m-3">
                        <img src="img/cart01.png" height="45">
                            <span class="text-warning"><?php echo $qty?></span>
                        </a>
                    <?php }?>

                
                    <!-- <a href="component/about.php" class="nav-item nav-link">About</a>
                    <a href="component/causes.php" class="nav-item nav-link">Causes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="component/service.php" class="dropdown-item">Service</a>
                            <a href="component/donate.php" class="dropdown-item">Donate</a>
                            <a href="component/team.php" class="dropdown-item">Our Team</a>
                            <a href="component/testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="component/404.php" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="component/contact.php" class="nav-item nav-link">Contact</a> -->
                </div>
                
                <div class="navbar-nav p-4 p-lg-0" id="logo" >
                    <a href="index.php" class="navbar-brand ms-4 ms-lg-0" >
                        <h1 class="fw-bold text-primary m-0" >TATC<span class="text-white">&Market</span></h1>
                    </a>
                </div>
                <?php 
                if(isset($_SESSION['username'])){
                    ?>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="Profile/index.php">
                            <?php echo $_SESSION['username'] ?>
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-user"></i>
                      
                        </div>
                    </a>
                </div>
                <?php
               }elseif(isset($_SESSION['mer_name'])){?>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="Profile/index.php">
                            <?php echo $_SESSION['mer_name'] ?>
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-user"></i>
                      
                        </div>
                    </a>
                </div>
               <?php }else{
                ?>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="Login & Register/Login.php">
                            Login Now
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-user"></i>
                      
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->