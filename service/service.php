<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_service = "SELECT * FROM services";
    $select_service_result = mysqli_query($db_connect,$select_service);
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
                    <h3 class="text-white" >SERVICE INFORMATION </h3>
                </div>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Logo Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_service_result as $kay => $service) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?> </th>
                                    <td> <?= $service['title'] ?> </td>
                                    <td> <?=$service['description'] ?> </td>
                                    <td>
                                        <img width="80" src="../upload/service/<?= $service['logo_image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?php if($service['status']) { ?>
                                            <a href="service_status.php?id=<?=$service['id']?>" class="btn btn-success" >Active</a>
                                        <?php } else{ ?>
                                            <a href="service_status.php?id=<?=$service['id']?>" class="btn btn-secondary" >deactivated</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($_SESSION['role']!=3) { ?>
                                        <a href="service_edit.php?id=<?= $service['id'] ?>"  class="btn btn-primary m-1">Edit</a>
                                        <?php } ?>
                                        <?php if($_SESSION['role']==1) { ?>
                                        <a href="service_delete.php?id=<?= $service['id'] ?>"  class="btn btn-danger click">Delete</a>
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