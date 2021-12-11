<?php
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';

$select_trash_users = "SELECT * FROM users where status=1";
$select_trash_users_result = mysqli_query($db_connect,$select_trash_users);
?>
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
      </nav>
</div><!-- sl-pagebody -->
<div class="sl-pagebody">
    <div class="row" >
        <div class="col-lg-8 m-auto " >
            <div class="card" >
            <div class="card-header bg-secondary text-center" >
                <h3 class="text-white" >TRASH INFORMATION</h3>
            </div>
                
            <?php if(isset($_SESSION['delete_user'])){ ?>
                <div class="alert alert-success mt-2">
                        <?=$_SESSION['delete_user'] ?>
                </div>
            <?php } unset($_SESSION['delete_user']) ?>

                <div class="card-body" > 
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Profile Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $select_trash_users_result as $kay => $trash_user) { ?>
                            <tr>
                                <th scope="row"> <?= $kay+1 ?> </th>
                                <td> <img width="80" src="../upload/users/<?= $trash_user['profile_photo'] ?>" alt=""></td>
                                <td> <?= $trash_user['name'] ?> </td>
                                <td> <?= $trash_user['email'] ?> </td>
                                <td> <?= $trash_user['created_at'] ?> </td>
                                
                                    <td>
                                <a href="restore.php?id=<?= $trash_user['id'] ?>" class="btn btn-info" >restore</a>

                                    <a href="delete.php?id=<?= $trash_user['id']?>" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                                            <!-- Modal -->
                            <div class="modal fade" id="mod<?= $trash_user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                            <a href="delete.php?id=<?= $trash_user['id'] ?>" class="btn btn-danger"> YES </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../dashboard_includes/footer.php'; ?>