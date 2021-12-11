<?php
require 'session.php';
require 'dashboard_includes/header.php'; 
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h2>Welcome Dashboard Admin Panel</h2>
          <p></p>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if(isset($_SESSION['login_in'])) { ?>
    
  <script>
        const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Signed in successfully'
    })
  </script>

<?php } unset($_SESSION['login_in']) ?>
<?php require 'dashboard_includes/footer.php'; ?>



