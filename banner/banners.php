<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_banner = "SELECT * FROM banner";
    $select_banner_result = mysqli_query($db_connect,$select_banner);
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
                    <h3 class="text-white" >BANNER INFORMATION </h3>
                </div>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Button name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_banner_result as $kay => $ban) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?> </th>
                                    <td> <?= $ban['title'] ?> </td>
                                    <td> <?= $ban['description'] ?> </td>
                                    <td>
                                        <img width="80" src="../upload/banner/<?= $ban['image'] ?>" alt="">
                                    </td>
                                    <td> <?= $ban['btn'] ?> </td>
                                    <td> 
                                        <?php if($ban['status']==1) { ?>
                                            <a href="banner_status.php?id=<?=$ban['id'];?>" class="btn btn-success">Active</a>
                                        <?php } else { ?>
                                            <a href="banner_status.php?id=<?=$ban['id'];?>"class="btn btn-secondary">Deactivate</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($_SESSION['role']!=3) { ?>
                                        <a href="banner_edit.php?id=<?= $ban['id'] ?>"  class="btn btn-primary m-1">Edit</a>
                                        <?php } ?>
                                        <?php if($_SESSION['role']==1) { ?>
                                        <a id="banner_delete.php?id=<?= $ban['id'] ?>"  class="btn btn-danger click">Delete</a>
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
    <?php if(isset($_SESSION['delete_banner'])){?>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    <?php } unset($_SESSION['delete_banner']); ?>
</script>
