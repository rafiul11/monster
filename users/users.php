<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_users = "SELECT * FROM users where status=0";
    $select_users_result = mysqli_query($db_connect,$select_users);
?>
<!-- ########## START: MAIN PANEL ########## -->


<?php if($_SESSION['role']!=0 ){ ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row" >
            <div class="col-lg-8 m-auto " >
                <div class="card" >
                <div class="card-header bg-dark text-center" >
                    <h3 class="text-white" >USERS INFORMATION </h3>
                </div>
                <?php if (isset($_SESSION['restore'])) { ?>
                    <div class="alert alert-success mt-2">
                            <?=$_SESSION['restore'] ?>
                    </div>
                <?php } unset($_SESSION['restore']) ?>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">role</th>
                                    <th scope="col">action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_users_result as $kay => $user) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?> </th>
                                    <td> <?= $user['name'] ?> </td>
                                    <td>
                                        <img width="80" src="../upload/users/<?= $user['profile_photo'] ?>" alt="">
                                    </td>

                                    <td>
                                        <?php if($user['role']==1){ ?>
                                            <span class="badge bg-success">Admin</span>
                                        <?php } 
                                        elseif($user['role']==2){ ?>
                                            <span class="badge bg-primary">Moderator</span>
                                        <?php }
                                        elseif($user['role']==3){ ?>
                                            <span class="badge bg-info">Viewer</span>
                                        <?php } else{ ?>
                                            <span class="badge bg-dark">User</span>
                                       <?php } ?>
                                    </td>
                                    
                                    <td>  
                                        <?php if($_SESSION['role']!=2) { ?>
                                        <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-dark" >View</a>
                                        <?php } ?>
                                        <?php if($_SESSION['role']!=3) { ?>
                                        <a href="edit.php?id=<?= $user['id'] ?>"  class="btn btn-primary m-1">Edit</a>
                                        <?php } ?>
                                        <?php if($_SESSION['role']==1) { ?>
                                        <a id="soft_delete.php?id=<?= $user['id'] ?>"  class="btn btn-danger click">Delete</a>
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
    <?php if(isset($_SESSION['soft_delete'])){?>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    <?php } unset($_SESSION['soft_delete']); ?>
</script>
