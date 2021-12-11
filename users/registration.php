<?php
 session_start();
 if(!isset($_SESSION['login'])){
     header('location:/monster/login.php');
 }
?>
<?php require '../dashboard_includes/header.php' ?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
      <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <form action="post.php" method="POST" enctype="multipart/form-data" > 
            <?php if(isset($_SESSION['success'])) {  ?>
                <div class="alert alert-success mt-2 mb-3" >
                    <?= $_SESSION['success'] ?>
                </div>
            <?php } unset($_SESSION['success']) ?> 
        <div class="form-group">
          <input type="name" class="form-control" name="name" placeholder="Enter your Username">
            <?php if(isset($_SESSION['errors']['name'])){ ?>
                <div class="alert alert-danger mt-2">
                    <?=$_SESSION['errors']['name']; ?>
                </div>
            <?php } unset($_SESSION['errors']['name'])?>

            <?php if(isset($_SESSION['name_exist'])) {  ?>
                <div class="alert alert-warning mt-2" >
                    <?= $_SESSION['name_exist'] ?>
                </div>
            <?php } unset($_SESSION['name_exist']) ?>

        </div><!-- form-group -->
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Enter your Email">
          
            <?php if(isset($_SESSION['errors']['email'])){ ?>
                <div class="alert alert-danger mt-2">
                    <?=$_SESSION['errors']['email']; ?>
                </div>
            <?php } unset($_SESSION['errors']['email']) ?>

            <?php if(isset($_SESSION['email_exist'])) {  ?>
                <div class="alert alert-warning mt-2" >
                    <?= $_SESSION['email_exist']  ?>
                </div>
            <?php } unset($_SESSION['email_exist']) ?>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
            <?php if(isset($_SESSION['errors']['password'])){ ?>
                <div class="alert alert-danger mt-2" role="alert">
                <?=$_SESSION['errors']['password']; ?>
                </div>
            <?php } unset($_SESSION['errors']['password']) ?>
        </div><!-- form-group -->
        <div class="form-group">
          <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Country</label>
          <div class="row row-xs">
            <div class="col-sm-12">
              <select name="country" class="form-control select2" >
                <option value="">Select Your Country</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="France">France</option>
                <option value="Italy">Italy</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
              </select>
                <?php if(isset($_SESSION['errors']['country'])){ ?>
                    <div class="alert alert-danger mt-2">
                        <?=$_SESSION['errors']['country']; ?>
                    </div>
                <?php } unset($_SESSION['errors']['country'])?>
            </div><!-- col-4 -->
          </div>
        </div><!-- form-group -->
        <?php if($_SESSION['role']==1) { ?>
        <div class="form-group">
          <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Role</label>
          <div class="row row-xs">
            <div class="col-sm-12">
            <select name="role" class="form-control select2" data-placeholder="Month" >
                <option value="">Select Role</option>
                <option value="1">Admin</option>
                <option value="2">Moderator</option>
                <option value="3">Viewer</option>
                <option value="0">user</option>
              </select>
          </div>
        </div>
       </div><!-- form-group -->
        <?php } ?>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1 mt-3">Profile Photo</label>
            <input type="file" name="profile_photo" class="form-control" >
            
            <?php if(isset($_SESSION['high'])) {  ?>
                <div class="alert alert-warning mt-2" >
                    <?= $_SESSION['high']  ?>
                </div>
            <?php } unset($_SESSION['high']) ?>

            <?php if(isset($_SESSION['invalid'])) {  ?>
                <div class="alert alert-warning mt-2" >
                    <?= $_SESSION['invalid']  ?>
                </div>
            <?php } unset($_SESSION['invalid']) ?>
        </div>
        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
      </form>
        

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php require '../dashboard_includes/footer.php'; ?>
<?php
unset($_SESSION['email']);
unset($_SESSION['password']);
?>