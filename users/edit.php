<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>

<?php
require '../db.php';
$id =$_GET['id'];
$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connect,$select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);
?>


   <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <form action="update.php" method="POST" enctype="multipart/form-data" >
    <div class="sl-pagebody"> 
        <div class="row" >
            <div class="col-lg-6 m-auto"> 
                <div class="card text-black mb-3" >
                    <div class="card-header text-black  text-center">
                        <h1>Edit Users Info</h1>
                    </div>
                    <?php if(isset($_SESSION['update_user'])){ ?>

                        <div class="alert alert-success">
                            <?=$_SESSION['update_user']?>
                        </div>

                    <?php } unset($_SESSION['update_user']) ?>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input value="<?= $after_assoc['name'] ?>" type="text" name="name" class="form-control">
                            <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input  value="<?= $after_assoc['email'] ?>" type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                            <div class="form-group">
                            <label class="">Country</label>
                                <div class="col-sm-12">
                                <select name="country" class="form-control select2" >
                                <option value="">Select Your Country</option>
                                <option value="Bangladesh"<?=($after_assoc['country']=='Bangladesh'?'selected' : '') ?>>Bangladesh</option>
                                <option value="USA"<?=($after_assoc['country']=='USA'?'selected' : '') ?> >USA</option>
                                <option value="UK" <?= ($after_assoc['country']=='UK'?'selected' : '') ?> >UK</option>
                                <option value="France"<?= ($after_assoc['country']=='France'?'selected' : '') ?>>France</option>
                                <option value="Italy" <?= ($after_assoc['country']=='Italy'?'selected' : '') ?> >Italy</option>
                                <option value="Germany"<?= ($after_assoc['country']=='Germany'?'selected' : '') ?> >Germany</option>
                                <option value="India"<?= ($after_assoc['country']=='India'?'selected' : '') ?> >India</option>
                                </select>
                               </div><!-- col-4 -->
                        </div><!-- form-group -->
        

                        <div class="form-group">
                            <label for="" class="from-label-control">Present Photo</label>
                            <br>
                            <img width="80" src="../upload/users/<?= $after_assoc['profile_photo'] ?>" alt="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Update Profile Photo</label>
                            <input  type="file" name="profile_photo" class="form-control" >
                        </div>
                            <?php if(isset($_SESSION['extension'])){ ?>
                                <div class="alert alert-warning">
                                    <?=$_SESSION['extension'] ?>
                                </div>
                            <?php } unset($_SESSION['extension']) ?>

                            <?php if(isset( $_SESSION['file_size'])){ ?>
                                <div class="alert alert-warning">
                                    <?=$_SESSION['file_size'] ?>
                                </div>
                            <?php } unset($_SESSION['file_size']) ?>

                        <div class="form-group text-center ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- </form> -->
                    </from>
                    </div>
                </div>
                
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php  require '../dashboard_includes/footer.php'; ?>
