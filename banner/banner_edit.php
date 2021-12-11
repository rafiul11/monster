<?php 
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';
$id= $_GET['id'];
$select_banner= "SELECT * FROM banner WHERE id=$id";
$select_banner_result = mysqli_query($db_connect,$select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);
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
                        <h5>Edit Banner</h5>
                    </div>
                    <?php if(isset($_SESSION['update_banner'])){ ?>
                        <div class="alert alert-success">
                            <?=$_SESSION['update_banner']?>
                        </div>
                    <?php } unset($_SESSION['update_banner']) ?>
                    <div class="card-body">
                        <form action="banner_update.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                <label for="" class="form-label-control">Title</label>
                                <input value="<?=$after_assoc['title']?>" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Description</label>
                                <textarea name="description" class="form-control"><?=$after_assoc['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label-control">Button</label>
                                <input value="<?=$after_assoc['btn']?>" type="text" name="btn" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Present Image</label>
                                <br>
                                <img width="200" src="../upload/banner/<?=$after_assoc['image']?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label-control">Banner Image</label>
                                <input type="file" name="image" class="form-control">
                                <?php if(isset($_SESSION['banner_size'])) { ?>
                                    <div class="alert alert-warning">
                                        <?=$_SESSION['banner_size']?>
                                    </div>
                                <?php } unset($_SESSION['banner_size']) ?>

                                <?php if(isset($_SESSION['banner_extension'])) { ?>
                                    <div class="alert alert-warning">
                                        <?=$_SESSION['banner_extension']?>
                                    </div>
                                <?php } unset($_SESSION['banner_extension']) ?>
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