<?php 
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';
$id= $_GET['id'];
$select_myself= "SELECT * FROM my_self WHERE id=$id";
$select_myself_result = mysqli_query($db_connect,$select_myself);
$after_assoc = mysqli_fetch_assoc($select_myself_result);
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
                    <?php if(isset($_SESSION['update_myself'])){ ?>
                        <div class="alert alert-success">
                            <?=$_SESSION['update_myself']?>
                        </div>
                    <?php } unset($_SESSION['update_myself']) ?>
                    <div class="card-body">
                        <form action="myself_update.php" method="POST">
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
                                <label for="" class="form-label-control">Year</label>
                                <input value="<?=$after_assoc['years']?>" type="text" name="years" class="form-control">
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