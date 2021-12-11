<?php 
require 'db.php';
//logo//
$select_logo = "SELECT * FROM logo where status=1";
$select_logo_result= mysqli_query($db_connect,$select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_result);

//blog//
$select_blog = "SELECT * FROM blog";
$select_blog_result= mysqli_query($db_connect,$select_blog);

//blog//
$id=$_GET['id'];
$select_blog_details = "SELECT * FROM blog where id=$id";
$select_blog_result_details= mysqli_query($db_connect,$select_blog_details);
$after_assoc_blog = mysqli_fetch_assoc($select_blog_result_details);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Richard. - Easy Onepage Personal Template">
    <meta name="author" content="Paul">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>Richard. - Easy Onepage Personal Template</title>
  </head>
<body>
   
   <!-- Loader -->
   <div class="loader">
    <div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>
   </div>
  
    <!-- Click capture -->
   <div class="click-capture d-lg-none"></div>

    <!-- Navbar -->  
    <nav id="scrollspy" class="navbar navbar-desctop">
        
      <div class="d-flex position-relative w-100">

        <!-- Brand-->
        <a class="navbar-brand" href="index.php"> <img width="100" src="upload/logo/<?=$after_assoc_logo['logo']?>" alt=""> </a>
          <ul class="navbar-nav-desctop mr-auto d-none d-lg-block">
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="#about">About</a></li>
            <li><a class="nav-link" href="#experience">Experience</a></li>
            <li><a class="nav-link" href="#projects">Projects</a></li>
            <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
          </ul>

        <!-- Social -->
        <ul class="social-icons mr-auto mr-lg-0 d-none d-sm-block">
           <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
           <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
           <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
           <li><a href="#"> <ion-icon name="logo-instagram"></ion-icon></a></li>
        </ul>

        <!-- Toggler -->
        <button class="toggler d-lg-none ml-auto">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>
      </div>
    </nav>


    <!-- Navbar Mobile -->  
    <nav id="navbar-mobile" class="navbar navbar-mobile d-lg-none">
      <ion-icon class="close" name="close-outline"></ion-icon>

      <!-- Social -->
      <ul class="social-icons mr-auto mr-lg-0">
         <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
         <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
         <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
         <li><a href="#"> <ion-icon name="logo-instagram"></ion-icon></a></li>
      </ul>

      <ul class="navbar-nav navbar-nav-mobile">
        <li><a class="nav-link" href="#home">Home</a></li>
        <li><a class="nav-link" href="#about">About</a></li>
        <li><a class="nav-link" href="#experience">Experience</a></li>
        <li><a class="nav-link" href="#projects">Projects</a></li>
        <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
       </ul>
       <div class="navbar-mobile-footer">
        <p>© 2020 Richard. All Rights Reserved.</p>
       </div>
    </nav>

     <section class="py-5" >
       <div class="container">
          <div class="row align-items-end">
            <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
          </div>
         <div class="row">
           <div class="col-lg-12">
             <h2><?=$after_assoc_blog['title']?></h2>
             <img src="upload/blog/<?=$after_assoc_blog['image']?>" alt="">
             <p><?=$after_assoc_blog['description']?></p>
           </div>
         </div>
       </div>
     </section>
    
    

     <!-- News -->
    <section id="news" class="section bg-light">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="text-gray my-0"><a href="#">View all news</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
          <div class="row-news row">
            <?php foreach($select_blog_result as $blog) { ?>
            <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
              <figure class="position-relative">
                <div class="position-relative">
                  <a href=""><img alt="" class="w-100 d-block" src="upload/blog/<?=$blog['image']?>"></a>
                  <mark class="date"><?=$blog['created_at']?></mark>
                </div>
                <figcaption><h5><a href="blog_details.php?id=<?=$blog['id']?>"><?=$blog['title']?></a></h5><?=$blog['description']?>
                </figcaption>
              </figure>
            </div>
            <?php } ?>
         </div>
        </div>
      </div>
    </section>
    <!-- Footer -->  
    <footer>
      <div class="section bg-dark py-5 pb-0">
        <div class="container">
          <div class="row">
           <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Phone:</h6>
             <p class="text-white mb-4">+72323156466:</p>
            </div>
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Email:</h6>
             <p class="text-white mb-4">Richard@example.com</p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Follow me:</h6>
              <ul class="social-icons">
               <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
               <li><a href="#"> <ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Subscribe:</h6>
              <form class="js-subscribe-form">
                <div class="input-group">
                  <input id="mc-email" type="email" class="form-control" placeholder="Email">
                  <div class="input-group-append">
                    <button class="btn" type="submit">Go</button>
                  </div>
                </div>
                <label class="mc-label" for="mc-email" id="mc-notification"></label>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copy section-sm">
        <div class="container">© Copyright 2020 Richard. All Rights Reserved</div>
       </div>
    </footer>
     
    <!-- Modal -->
    <div class="modal fade" id="send-request">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title mt-0">Send request</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Leave your contacts and our managers
              will contact you soon.</p>
           <form class="form-request" action="massage_post.php" method="POST">
             <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
             <div class="form-group">
               <input type="email" name="email"  class="form-control" required="" placeholder="Email *">
             </div>
             <div class="form-group">
              <textarea rows="3" name="message"  class="form-control" placeholder="Message"></textarea>
             </div>
             <div class="message" id="success-message">Your message is successfully sent...</div>
             <div class="message" id="error-message">Sorry something went wrong</div>
             <div class="form-group mb-0 text-right">
               <button type="submit" class="btn">Submit</button>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
<!-- Optional JavaScript -->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script src="js/jarallax.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/interface.js"></script>
</body>
</html>