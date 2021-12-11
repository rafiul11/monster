<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_skills = "SELECT * FROM skills";
    $select_skills_result = mysqli_query($db_connect,$select_skills);
?>


<!-- ########## START: MAIN PANEL ########## -->
<?php if($_SESSION['role']!=0 ){ ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row" >
            <div class="col-lg-10 m-auto " >
                <div class="card" >
                <div class="card-header bg-dark text-center" >
                    <h3 class="text-white" >SKILLS INFORMATION </h3>
                </div>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Skill Name</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_skills_result as $kay => $skill) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?> </th>
                                    <td> <?= $skill['skill_name'] ?> </td>
                                    <td> <?=$skill['percentage'] ?> </td>
                                    <td>
                                        <?php if($skill['status']) { ?>
                                            <a href="skill_status.php?id=<?=$skill['id']?>" class="btn btn-success" >Active</a>
                                        <?php } else{ ?>
                                            <a href="skill_status.php?id=<?=$skill['id']?>" class="btn btn-secondary" >deactivated</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($_SESSION['role']!=3) { ?>
                                        <a href="skill_edit.php?id=<?= $skill['id'] ?>"  class="btn btn-primary m-1">Edit</a>
                                        <?php } ?>
                                        <?php if($_SESSION['role']==1) { ?>
                                        <a id="skill_delete.php?id=<?= $skill['id'] ?>"  class="btn btn-danger click">Delete</a>
                                        <?php } ?>
                                    </td>
                                </tr>  
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php } ?>
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['limit'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['limit']?>',
        })
    </script>
<?php } unset($_SESSION['limit']) ?>

<!-- delete -->
<script>
    $('.click').click(function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=$(this).attr('id');
        }
        })
    })
    <?php if(isset($_SESSION['delete'])){?>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    <?php } unset($_SESSION['delete']); ?>
</script>