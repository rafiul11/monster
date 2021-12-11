<?php 
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';
$id= $_GET['id'];
$select_testimonials= "SELECT * FROM testimonials WHERE id=$id";
$select_testimonials_result = mysqli_query($db_connect,$select_testimonials);
$after_assoc = mysqli_fetch_assoc($select_testimonials_result);
?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card text-info">
                    <div class="card-header text-center">
                        <h5>Edit Service</h5>
                    </div>
                    <?php if(isset($_SESSION['update'])){ ?>
                        <div class="alert alert-success">
                            <?=$_SESSION['update']?>
                        </div>
                    <?php } unset($_SESSION['update']) ?>
                    <div class="card-body">
                        <form action="testimonials_update.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                <label for="" class="form-label-control">Details</label>
                                <textarea name="details" class="form-control"><?=$after_assoc['details']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Company Name</label>
                                <input value="<?=$after_assoc['company_name']?>" type="text" name="company_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Present Image</label>
                                <br>
                                <img width="200" src="../upload/testimonials/<?=$after_assoc['image']?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label-control">Image</label>
                                <input type="file" name="image" class="form-control">
                                <?php if(isset($_SESSION['size'])) { ?>
                                    <div class="alert alert-warning">
                                        <?=$_SESSION['size']?>
                                    </div>
                                <?php } unset($_SESSION['size']) ?>

                                <?php if(isset($_SESSION['extension'])) { ?>
                                    <div class="alert alert-warning">
                                        <?=$_SESSION['extension']?>
                                    </div>
                                <?php } unset($_SESSION['extension']) ?>
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Position</label>
                                <input value="<?=$after_assoc['position']?>" type="text" name="position" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

















<?php
require '../dashboard_includes/footer.php';
?>