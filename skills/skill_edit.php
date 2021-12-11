<?php 
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';
$id= $_GET['id'];
$select_skills= "SELECT * FROM skills WHERE id=$id";
$select_skills_result = mysqli_query($db_connect,$select_skills);
$after_assoc = mysqli_fetch_assoc($select_skills_result);
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
                        <h5>Edit skills</h5>
                    </div>
                    <?php if(isset($_SESSION['update_skill'])){ ?>
                        <div class="alert alert-success">
                            <?=$_SESSION['update_skill']?>
                        </div>
                    <?php } unset($_SESSION['update_skill']) ?>
                    <div class="card-body">
                        <form action="skill_update.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                <label for="" class="form-label-control">Skill Name</label>
                                <input value="<?=$after_assoc['skill_name']?>" type="text" name="skill_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="from-label-control">Percentage</label>
                                <input value="<?=$after_assoc['percentage']?>" type="text" name="percentage" class="form-control">
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